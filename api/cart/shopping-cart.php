<?php

// Error reporting
ini_set('display_errors', 0); 
error_reporting(E_ALL); 


// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    exit;
}

// CORS headers for actual requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// Initialize session
session_start();

// Initialize response array
$response = [];

// Handle both GET and POST requests
$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : null;

if ($item_id !== null) {
    $itemDetails = getItemDetails($item_id);
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

// Add item to cart
function addToCart($item_id, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION["cart"][$item_id])) {
        $_SESSION['cart'][$item_id] += $quantity;
    } else {
        $_SESSION['cart'][$item_id] = $quantity;
    }

    $itemDetails = getItemDetails($item_id);
    return [
        "message" => "Added item to the cart.",
        "item_details" => $itemDetails
    ];
}

// Display cart
function displayCart() {
    // Assuming $_SESSION['cart'] is structured as ['item_id' => quantity, ...]
    $cartDetails = [];
    foreach ($_SESSION['cart'] as $item_id => $quantity) {
        $item = getItemDetails($item_id); // Fetch item details
        if (!isset($item['error'])) {
            $item['quantity'] = $quantity; // Add quantity to item details
            $cartDetails[] = $item; // Add item details to cart details
        }
    }
    return $cartDetails; // This ensures an array is always returned
}




// Get cart details including item details
function getCartDetails($cart) {
    $cartDetails = [];

    foreach ($cart as $item_id => $quantity) {
        $itemDetails = getItemDetails($item_id);
        
        if (isset($itemDetails['error'])) {
            return ["error" => "Failed to get cart details. " . $itemDetails['error']];
        }

        $itemDetails['quantity'] = $quantity;
        $cartDetails[] = $itemDetails;
    }

    return $cartDetails;
}

function getItemCategory($item_id) {
    return match (true) {
        $item_id >= 1 && $item_id <= 10 => 'armors',
        $item_id >= 11 && $item_id <= 20 => 'grimoires',
        $item_id >= 21 && $item_id <= 28 => 'potions',
        $item_id >= 29 && $item_id <= 33 => 'shields',
        $item_id >= 34 && $item_id <= 42 => 'weapons',
        default => 'unknown',
    };
}
