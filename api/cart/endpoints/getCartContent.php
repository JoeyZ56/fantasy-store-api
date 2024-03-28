<?php
// Error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize session
// session_set_cookie_params([
//     'lifetime' => 0, // or another value, 0 indicates until the browser is closed
//     'path' => '/', 
//     'domain' => '', // default value, consider setting if issues persist
//     'secure' => false, // set to true if using HTTPS
//     'httponly' => true, // prevents JavaScript access to session cookie
//     'samesite' => 'Lax' // or 'Strict' based on your cross-origin needs
// ]);

session_start();


// Development
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}


// CORS headers
// header('Access-Control-Allow-Origin: https://fantasy-e-commerce-store.vercel.app');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');


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


/*
getCartContent.php:

Specifically designed to retrieve and send the contents of the cart. This script checks if the session cart is set and not empty, then iterates over each item, fetching its details, and finally, returns this data as a JSON response.
Similar to shopping-cart.php, it relies on sessions and properly configured CORS headers.
*/