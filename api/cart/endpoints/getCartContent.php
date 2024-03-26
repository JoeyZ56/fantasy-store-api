<?php
// Error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// You might also need to handle preflight requests explicitly
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return status 200 for preflight requests
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    exit(0);
}


// Initialize the response array or object
$response = [];

require_once '../getItemDetails.php';




// Check if the cart exists and isn't empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartItems = [];
    foreach ($_SESSION['cart'] as $item_id => $quantity) {
        // Debugging statement
        error_log(print_r($_SESSION['cart'], true));
        // Here you would fetch each item's details by its ID
        // This might involve a call to a function or method that gets item details from a database
        $itemDetails = findItemById($item_id); // You need to implement this function
        if ($itemDetails) {
            $itemDetails['quantity'] = $quantity; // Add quantity information to the item details
            $cartItems[] = $itemDetails; // Add the item details to the cart items array
        }
    }
    $response['cartContents'] = $cartItems;
} else {
    // Cart is empty
    $response['error'] = "Your cart is empty.";
}

header('Content-Type: application/json');
echo json_encode($response);
exit;