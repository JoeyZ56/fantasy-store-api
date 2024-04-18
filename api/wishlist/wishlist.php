<?php
require_once '../utilities/session_setting.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Including CORS settings
require_once '../utilities/cors_header.php';

// Log the session data for debugging
error_log("Checking login status in wishlist: " . print_r($_SESSION, true));

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit(403);  // Using HTTP status code 403 for Forbidden access
}

error_log("User ID: " . $_SESSION['user_id']);

$json_str = file_get_contents('php://input');
$data = json_decode($json_str, true);

$item_id = filter_var($data['item_id'], FILTER_SANITIZE_NUMBER_INT);
$user_id = $_SESSION['user_id']; // Directly using session user_id

if (!$item_id) {
    echo json_encode(['error' => 'Invalid item ID']);
    exit(400);  // Using HTTP status code 400 for Bad Request
}

require_once("../database/database.php");

if (!$conn) {
    echo json_encode(['error' => "Database connection error"]);
    exit(500);  // Using HTTP status code 500 for Internal Server Error
}

$stmt = $conn->prepare("INSERT INTO wishlist (user_id, item_id) VALUES (?, ?)");
if (!$stmt) {
    echo json_encode(['error' => "Failed to prepare statement: " . $conn->error]);
    exit(500);
}

if (!$stmt->bind_param("ii", $user_id, $item_id)) {
    echo json_encode(['error' => "Failed to bind params: " . $stmt->error]);
    exit(500);
}

if (!$stmt->execute()) {
    echo json_encode(['error' => "Failed to execute statement: " . $stmt->error]);
    exit(500);
}

echo json_encode(['success' => 'Item added to wishlist']);
