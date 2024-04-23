<?php
// require_once '../utilities/session_setting.php';
require_once '../utilities/cors_header.php';
require_once '../database/database.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT item_id FROM wishlist WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'items' => $items]);
} catch (PDOException $e) {
    error_log('Database error - ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error']);
}
