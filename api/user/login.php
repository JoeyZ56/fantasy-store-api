<?php
require_once '../utilities/session_setting.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// CORS
require_once '../utilities/cors_header.php';

// Variable to track login validation
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../database/database.php"); // Database connection

    if (!isset($_POST["email"]) || !isset($_POST["password"])) {
        $is_invalid = true;
    } else {
        $stmt = $mysqli->prepare("SELECT id, name, password_hash FROM user WHERE email = ?");
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($_POST["password"], $user["password_hash"])) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["name"];
            $_SESSION["logged_in"] = true;

            session_write_close(); // Close the session to save data

            echo json_encode([
                "success" => true,
                "username" => $user["name"],
                "redirect" => "http://localhost:5173/"
            ]);
            exit;
        } else {
            $is_invalid = true;
        }
        $stmt->close();
    }
}

if ($is_invalid) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid email or password"]);
    exit;
}
