<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type'); // Adjust based on the headers you use
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Add other allowed methods if needed
    exit;
}

// CORS headers for actual requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type'); // Adjust based on the headers you use

// Initialize session
session_start();
error_log("Session data: " . print_r($_SESSION, true));


// Handle both GET and POST requests
$product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product_id !== null) {
    addToCart($product_id);
} else {
    displayCart(); // Display the cart for GET requests
}

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

    // Fetch item details from the respective item file
    $itemDetails = getItemDetails($product_id);

    echo json_encode([
        "message" => "Added item to the cart.",
        "item_details" => $itemDetails
    ]);
    // Make sure to exit to prevent additional output
    exit;
}


// Display cart
function displayCart() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cartDetails = getCartDetails($_SESSION['cart']);
        echo json_encode($cartDetails);
    } else {
        echo json_encode(["message" => "Your cart is empty (Serverside)."]);
    }
}


// Get item details from the respective item file
function getItemDetails($product_id) {
    // Fetch item details based on $product_id from the respective item file
    $itemCategory = getItemCategory($product_id);
    $itemFile = "items/$itemCategory.php";

    if (file_exists($itemFile)) {
        $items = include($itemFile);

        // Find the item with the given product_id
        foreach ($items as $item) {
            if ($item['id'] == $product_id) {
                return $item;
            }
        }

        return ["error" => "Item not found with ID $product_id."];
    } else {
        return ["error" => "Item category file not found."];
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


function getItemCategory($product_id) {
    if ($product_id >= 1 && $product_id <= 8) {
        return 'armors';
    } elseif ($product_id >= 27 && $product_id <= 30) {
        return 'grimoires';
    } elseif ($product_id >= 21 && $product_id <= 26) {
        return 'potions';
    } elseif ($product_id >= 18 && $product_id <= 20) {
        return 'shields';
    } elseif ($product_id >= 9 && $product_id <= 17) {
        return 'weapons';
    } else {
        return null;
    }
}

