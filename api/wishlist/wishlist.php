<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header('Content-Type: application/json');  // Ensure the correct content type is set for JSON response

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit(403);
}

$json_str = file_get_contents('php://input');
$data = json_decode($json_str, true);

$user_id = filter_var($data['user_id'], FILTER_SANITIZE_NUMBER_INT);
$item_id = filter_var($data['item_id'], FILTER_SANITIZE_NUMBER_INT);

if (!$user_id || !$item_id) {
    echo json_encode(['error' => 'Invalid user or item ID']);
    exit(400);
}

require_once("../database/database.php");

if (!$conn) {
    echo json_encode(['error' => "Database connection error"]);
    exit(500);
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
?>
