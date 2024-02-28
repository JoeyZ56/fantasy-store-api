<?php

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
error_log("Session data: " . print_r($_SESSION, true));



// Initialize response array
$response = [];


// Handle both GET and POST requests
$product_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : null;
error_log("Product ID: " . $product_id);
error_log("Received request: " . print_r($_REQUEST, true));

if ($product_id !== null) {
    $itemDetails = getItemDetails($product_id);
    $response['item'] = $itemDetails; // Use the result of getItemDetails
} else {
    $response['item'] = null; // Or handle the case where $product_id is null
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product_id !== null) {
    $response['cartUpdate'] = addToCart($product_id);
} else {
    
    $response['cartContents'] = displayCart();
}

header('Content-Type: application/json');
echo json_encode($response);
exit;



// Add item to cart
function addToCart($product_id, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION["cart"][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    $itemDetails = getItemDetails($product_id);
    return [
        "message" => "Added item to the cart.",
        "item_details" => $itemDetails
    ];
}

// Display cart
function displayCart() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        return getCartDetails($_SESSION['cart']);
    } else {
        return ["message" => "Your cart is empty (Serverside)."];
    }
}


function getItemDetails($product_id) {
    $itemCategory = getItemCategory($product_id);
    $itemFile = "../items/$itemCategory.php"; // Ensure this path is correct
   

    // Ensure the file exists and include it
    if (file_exists($itemFile)) {
        $items = include($itemFile); // Capture the included data

        // Ensure $items is an array or object before attempting to use it
        if (is_array($items) || is_object($items)) {
            foreach ($items as $item) {
                if ($item['id'] == $product_id) {
                    return $item; // Return the found item
                }
            }
            return ["error" => "Item not found with ID $product_id."];
        } else {
            return ["error" => "Item file for $itemCategory does not contain an array or object."];
        }
    } else {
        return ["error" => "Item category file not found for $itemCategory."];
    }
}





// Get cart details including item details
function getCartDetails($cart) {
    $cartDetails = array();

    foreach ($cart as $product_id => $quantity) {
        $itemDetails = getItemDetails($product_id);
        
        // Check if item details are fetched successfully
        if (isset($itemDetails['error'])) {
            return ["error" => "Failed to get cart details. " . $itemDetails['error']];
        }

        $itemDetails['quantity'] = $quantity;
        $cartDetails[] = $itemDetails;
    }

    // return $cartDetails;
    json_encode($cartDetails);
}

function getItemCategory($product_id) {
    if ($product_id >= 1 && $product_id <= 10) {
        return 'armors';
    } elseif ($product_id >= 11 && $product_id <= 20) {
        return 'grimoires';
    } elseif ($product_id >= 21 && $product_id <= 28) {
        return 'potions';
    } elseif ($product_id >= 29 && $product_id <= 33) {
        return 'shields';
    } elseif ($product_id >= 34 && $product_id <= 42) {
        return 'weapons';
    } else {
        return 'unknown';
    }
}


