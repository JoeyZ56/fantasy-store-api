<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//error loging
error_log('Session ID at start: ' . session_id());

// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//CORs  
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

require_once("../database/database.php");

//Securly gettign data from the request
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_SANITIZE_NUMBER_INT); 

//validate the data
if (false === $user_id || false === $item_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid user or item ID']);
    exit;
}

//SQL to add item to wishlist
$sql = "INSERT INTO wishlist (user_id, item_id) VALUES (?, ?)";

//Prepare the statement
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['error' => "Failed to prepare statement: $conn->error"]);
    exit;
}

$success = $stmt->bind_param("li", $user_id, $item_id);
if ($success === false) {
    http_response_code(500);
    echo json_encode(['error' => "Failed to bind params: $stmt->error"]);
    exit;
}

$success = $stmt->execute();
if ($success === false) {
    http_response_code(500);
    echo json_encode(['error' => "Failed to execute statement: $stmt->error"]);
    exit;
}

header('Content-Type: application/json');
exit(json_encode(['success' => 'Item added to wishlist']));