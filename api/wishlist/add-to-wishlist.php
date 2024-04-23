<?php
require_once '../utilities/session_setting.php';
require_once '../utilities/cors_header.php';
require_once '../database/database.php';

// error_log("Session data: " . print_r($_SESSION, true));

// Ensure User is logged in
if (!isset($_SESSION['id'])) {
    error_log("User not logged in attempt.");
    echo json_encode(['success' => false, 'message' => "User not logged in"]);
    exit;
}

// Check if PDO is available
if (!isset($pdo) || !$pdo) {
    error_log('PDO object is not initialized');
    echo json_encode(['success' => false, 'message' => 'Database unavailable']);
    exit;
}

// Retrieve and Validate the item id
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
if (!$item_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid item ID']);
    exit;
}

// Insert the item into the wishlist Database
try {
    $stmt = $pdo->prepare("INSERT INTO wishlist (user_id, item_id) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . implode(";", $pdo->errorInfo()));
    }
    $stmt->execute([$_SESSION['user_id'], $item_id]);
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => "Item added to wishlist"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Failed to add item to wishlist"]);
    }
} catch (Exception $e) {
    error_log('Database error - ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => "Database error: " . $e->getMessage()]);
}
