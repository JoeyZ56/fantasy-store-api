<?php
// Start session 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");

// Initialize the response array
$response = [];

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

require_once '../cartManagment.php'; 
require_once '../getItemDetails.php';

// Remove item from cart
if ($_SERVER["REQUEST_METHOD"] === 'DELETE') {
    $item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : null;

    if (!$item_id) {
        $response['error'] = 'Item ID is required';
        http_response_code(400); // Bad Request
        echo json_encode($response);
        exit;
    }

    $response['result'] = removeFromCart($item_id);
    if (!$response['result']) {
        $response['error'] = "Item not found in cart";
        http_response_code(404); // Not Found
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
