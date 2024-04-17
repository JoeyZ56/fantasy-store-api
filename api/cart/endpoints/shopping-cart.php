<?php
require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../getItemDetails.php';
require_once '../cartManagment.php';


//error loging
// error_log('Session ID at start: ' . session_id());
// error_log('Session contents: ' . print_r($_SESSION, true));
// error_log('Session contents after modification: ' . print_r($_SESSION, true));

// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize response array
$response = [];

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $response['cartContents'] = [];
}


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
function getCartDetails($cart)
{
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