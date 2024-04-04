<?php
// Initialize session
session_start();

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// CORS
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");


// Variable to track login validation
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection
    require_once("../database/database.php");

    // Check if email & password fields are set and not empty
    if (!isset($_POST["email"]) || !isset($_POST["password"])) {
        $is_invalid = true;
    } else {
        // Prepared statement to prevent SQL injection
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch user record
        $user = $result->fetch_assoc();

        // Check if the user exists and the password is correct
        if ($user && password_verify($_POST["password"], $user["password_hash"])) {
            // Regenerate session ID for security
            session_regenerate_id(true);

            // Set user session information
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["name"]; // Assuming 'name' is the column name for username
            $_SESSION["logged_in"] = true;

            // Instead of redirecting, send a JSON response with success status and username for local storage
            echo json_encode([
                "success" => true,
                "username" => $user["name"], // Send the username to store in localStorage
                "redirect" => "http://localhost:5173/" // Send the redirect URL
            ]);
            exit;
        } else {
            $is_invalid = true;
        }
        $stmt->close();
    }
}

// If the login is invalid, respond with a 401 Unauthorized
if ($is_invalid) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid email or password"]);
    exit;
}
