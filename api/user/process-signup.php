<?php
require_once '../utilities/session_manager.php';
require_once '../utilities/cors_header.php';
require_once("../database/database.php");

// Log the session data for debugging
// error_log("Checking login status: " . print_r($_SESSION, true));

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$errors = validateInputs($_POST);

if (!empty($errors)) {
    sendErrorResponse(400, $errors);
}

if (emailExists($mysqli, $_POST["email"])) {
    sendErrorResponse(409, ["Email already exists"]);
}

if (registerUser($mysqli, $_POST)) {
    echo json_encode([
        "success" => true,
        "redirect" => "http://localhost:5173/",
        "username" => $_POST["name"],
    ]);
} else {
    sendErrorResponse(500, ["Unable to register user"]);
}

function validateInputs($inputs)
{
    $errors = [];
    if (empty($inputs["name"])) $errors[] = "Name is required";
    if (!filter_var($inputs["email"], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    if (strlen($inputs["password"]) < 3) $errors[] = "Password must be at least 3 characters long";
    if (!preg_match("/[a-z]/i", $inputs["password"])) $errors[] = "Password must contain at least one letter";
    if (!preg_match("/[0-9]/", $inputs["password"])) $errors[] = "Password must contain at least one number";
    if ($inputs["password"] != $inputs["password_confirmation"]) $errors[] = "Password does not match";
    return $errors;
}

function emailExists($db, $email)
{
    $stmt = $db->prepare("SELECT 1 FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $exists = $result->num_rows > 0;
    $stmt->close();
    return $exists;
}

function registerUser($db, $inputs)
{
    $password_hash = password_hash($inputs["password"], PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $inputs["name"], $inputs["email"], $password_hash);
    if ($stmt->execute()) {
        $_SESSION["user_id"] = $db->insert_id;
        $_SESSION["user_name"] = $inputs["name"];
        $_SESSION["logged_in"] = true;
        $stmt->close();
        return true;
    }
    $stmt->close();
    return false;
}

function sendErrorResponse($statusCode, $errors)
{
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "errors" => $errors]);
    exit;
}
