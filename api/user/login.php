<?php
require_once '../utilities/session_setting.php';
require_once '../utilities/cors_header.php';

session_start();

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Log the session data for debugging
error_log("Checking login status before execution: " . print_r($_SESSION, true));

// Variable to track login validation
$is_invalid = false;

// Read JSON input
$input = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../database/database.php"); // Database connection

    if (!isset($input["email"]) || !isset($input["password"])) {
        $is_invalid = true;
        error_log("Email or password not set in JSON request");
    } else {
        $stmt = $mysqli->prepare("SELECT id, name, password_hash FROM user WHERE email = ?");
        $stmt->bind_param("s", $input["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($input["password"], $user["password_hash"])) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["name"];
            $_SESSION["logged_in"] = true;

            error_log("Session variables set after execution: " . print_r($_SESSION, true));

            session_write_close(); // Close the session to save data

            echo json_encode([
                "success" => true,
                "username" => $user["name"],
                "redirect" => "http://localhost:5173/"
            ]);
            exit;
        } else {
            $is_invalid = true;
            error_log("Invalid login attempt for email: " . $input['email']);
        }
        $stmt->close();
    }
}

if ($is_invalid) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid email or password"]);
    exit;
}
