<?php
// Start session
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');


// CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$errors = [];

// Validate Name
if (empty($_POST["name"])) {
    $errors[] = "Name is required";
}

// Validate Email
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

// Validate Password
if (strlen($_POST["password"]) < 3) {
    $errors[] = "Password must be at least 3 characters long";
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    $errors[] = "Password must contain at least one letter";
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    $errors[] = "Password must contain at least one number";
}

// Validate Confirm Password
if ($_POST["password"] != $_POST["password_confirmation"]) {
    $errors[] = "Password does not match";
}

if (!empty($errors)) {
    http_response_code(400); // Bad request
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "errors" => $errors]);
    exit;
}

// Hash the password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

require_once("../database/database.php");

// Database connection error handling
if ($mysqli->connect_errno) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "errors" => ["Database connection failed: " . $mysqli->connect_error]]);
    exit;
}

// Check if email already exists
$checkEmailSql = "SELECT * FROM user WHERE email = ?";
$checkEmailStmt = $mysqli->prepare($checkEmailSql);
$checkEmailStmt->bind_param("s", $_POST["email"]);
$checkEmailStmt->execute();
$result = $checkEmailStmt->get_result();

if ($result->num_rows > 0) {
    $checkEmailStmt->close();
    http_response_code(409); // Conflict
    echo json_encode(["success" => false, "errors" => ["Email already exists"]]);
    exit;
}

$checkEmailStmt->close();

// Insert new user
$insertUserSql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$insertUserStmt = $mysqli->prepare($insertUserSql);
$insertUserStmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($insertUserStmt-> execute()) {
    //fetch the last inserted ID
    $userId = $mysqli->insert_id;

    //set session variables
    $_SESSION["user_id"] = $userId;
    $_SESSION["user_name"] = $_POST["name"]; //store the username in the session
    $_SESSION["logged_in"] = true;

    echo json_encode([
        "success" => true,
        "redirect" => "http://localhost:5173/",
        "username" => $_POST["name"], //send the username back to the frontend
    ]);
    exit;
} else {
    $errors[] = "Error: " . $insertUserSql . "<br>" . $mysqli->error;
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "errors" => $errors]);
}

$insertUserStmt->close();
exit;
