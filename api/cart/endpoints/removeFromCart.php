<?php
require_once '../../utilities/session_setting.php';

// Start session 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// CORS
require_once '../../utilities/cors_header.php';

// Initialize the response array
$response = [];


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
