<?php

// Error reporting
ini_set('display_errors', 1); 
error_reporting(E_ALL); 




// Initialize session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');



// Initialize response array
$response = [];

require_once '../getItemDetails.php';
require_once '../cartManagment.php';


// Handle both GET and POST requests
$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : null;

if ($item_id !== null) {
    $itemDetails = findItemById($item_id);
    $response['item'] = $itemDetails; // Use the result of getItemDetails
} else {
    $response['item'] = null; // Or handle the case where $item_id is null
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $item_id !== null) {
    $response['cartUpdate'] = addToCart($item_id);
} else {
    $response['cartContents'] = displayCart();
}

header('Content-Type: application/json');
echo json_encode($response);
exit;

// Get cart details including item details
function getCartDetails($cart) {
    $cartDetails = [];

    foreach ($cart as $item_id => $quantity) {
        $itemDetails = findItemById($item_id);
        
        if (isset($itemDetails['error'])) {
            return ["error" => "Failed to get cart details. " . $itemDetails['error']];
        }

        $itemDetails['quantity'] = $quantity;
        $cartDetails[] = $itemDetails;
    }

    return $cartDetails;
}


