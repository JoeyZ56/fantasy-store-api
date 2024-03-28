<?php

// Error reporting
ini_set('display_errors', 1); 
error_reporting(E_ALL); 




// Initialize session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Development
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

// CORS 
// header('Access-Control-Allow-Origin: https://fantasy-e-commerce-store.vercel.app');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');




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


/*
shopping-cart.php:

Handles both GET and POST requests. It can add an item to the cart if an item ID is provided and a POST request is made. Otherwise, it attempts to display the current cart contents.
Utilizes sessions to store cart data, making it crucial that the session cookie is properly handled by the client.
Sends back JSON responses with either the updated cart after adding an item or the current contents of the cart.
*/