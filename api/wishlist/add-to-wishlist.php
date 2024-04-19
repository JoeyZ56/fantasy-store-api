<?php
require_once '../utilities/session_setting.php';
require_once '../utilities/cors_header.php';
require_once '../database/database.php';

//Ensure User is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => "User not logged in, in add-to-wishlist.php"]);
    exit;
}

// Retrieve and Validate the item id
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
if (!$item_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid item id']);
    exit;
}

//Insert the item into the wishlist Database
try {
    $stmt = $pdo->prepare("INSERT INTO wishlist (user_id, item_id) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $item_id]);
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => "Item added to wishlist database"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Faled to add items to wishlist database"]);
    }
} catch (PDOException $e) {
    error_log('Database_error - ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => "Database Error!!!"]);
}
