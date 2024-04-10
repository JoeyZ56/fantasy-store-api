<?php
//Starting session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
    exit(0);
}


// Development
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}


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
        // Debugging statement
error_log(print_r($_SESSION['cart'], true));

    }
    $response['cartContents'] = $cartItems;
} else {
    // Cart is empty
    $response['error'] = "Your cart is empty.";
    $response['cartContents'] = [];
}

header('Content-Type: application/json');
echo json_encode($response);
exit;

