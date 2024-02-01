<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

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
$product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product_id !== null) {
    $response['cartUpdate'] = addToCart($product_id);
} else {
    $response['cartContents'] = displayCart();
}

// Output the unified JSON response
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
    $itemFile = "../items/$itemCategory.php"; // Adjusted relative path

    if (file_exists($itemFile)) {
        $items = include($itemFile);

        // Find the item with the given product_id
        if (is_array($items) || is_object($items)) {
        foreach ($items as $item) {
            if ($item['id'] == $product_id) {
                return $item;
            }
        }
        } else {
            return ["error" => "Item file does not contain an array."];
        }

        return ["error" => "Item not found with ID $product_id."];
    } else {
        return ["error" => "Item category file not found for $itemFile."];
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

    return $cartDetails;
}

//armors 1-8
//weapons 9-17
//shields 18-20
//potions 21-26
//grimoires 27-30
function getItemCategory($product_id) {
    if ($product_id >= 1 && $product_id <= 8) {
        return 'armors';
    } elseif ($product_id >= 9 && $product_id <= 17) {
        return 'weapons';
    } elseif ($product_id >= 18 && $product_id <= 20) {
        return 'shields';
    } elseif ($product_id >= 21 && $product_id <= 26) {
        return 'potions';
    } elseif ($product_id >= 27 && $product_id <= 30) {
        return 'grimoires';
    } else {
        return 'unknown';
    }
}


