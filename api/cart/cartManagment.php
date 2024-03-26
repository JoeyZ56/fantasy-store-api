<?php
// Error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once __DIR__ . '/./getItemDetails.php';


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

    $itemDetails = findItemById($item_id);
    return [
        "message" => "Added item to the cart.",
        "item_details" => $itemDetails
    ];
}

// Display cart
function displayCart() {
    $cartDetails = [];

    // Check if 'cart' is set and is an array before iterating
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            $item = findItemById($item_id); // Fetch item details
            if (!isset($item['error'])) {
                $item['quantity'] = $quantity; // Add quantity information
                $cartDetails[] = $item; // Append item details to cart details array
            }
        }
    } else {
        // Optionally handle the case where the cart is not set or not an array
        error_log("The cart is not set or not an array.");
    }

    return $cartDetails; // Return the compiled cart details
}

