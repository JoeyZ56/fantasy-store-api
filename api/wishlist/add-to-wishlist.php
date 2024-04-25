<?php
require_once '../utilities/session_manager.php';
require_once '../utilities/cors_header.php';
require_once '../database/database.php';

// Debug: Log session data
// error_log("Session data: " . print_r($_SESSION, true));

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {  // Ensure this session variable is the same throughout your application
    error_log("User not logged in attempt.");
    echo json_encode(['success' => false, 'message' => "User not logged in"]);
    exit;
}

// Check if PDO is available
if (!isset($pdo) || !$pdo instanceof PDO) {  // More explicit check for PDO object
    error_log('PDO object is not initialized');
    echo json_encode(['success' => false, 'message' => 'Database unavailable']);
    exit;
}

// Retrieve and validate the item ID
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
if (!$item_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid item ID']);
    exit;
}

// Insert the item into the wishlist database
try {
    $stmt = $pdo->prepare("INSERT INTO wishlist (user_id, item_id) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . implode(";", $pdo->errorInfo()));
    }
    $success = $stmt->execute([$_SESSION['user_id'], $item_id]);
    if ($success && $stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => "Item added to wishlist"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Failed to add item to wishlist"]);
    }
} catch (Exception $e) {
    error_log('Database error - ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => "Database error: " . $e->getMessage()]);
}
