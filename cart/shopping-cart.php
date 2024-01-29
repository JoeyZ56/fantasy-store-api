<?php

//Check for Preflight Requests
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     // CORS headers for preflight requests
//     header('Access-Control-Allow-Origin: *');
//     header('Access-Control-Allow-Headers: *');
//     exit;
// }


// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');


//Initialize session
session_start();

//Handle both GET and POST requests
// $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : null;

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product_id !== null) {
//     addToCart($product_id);
// } else {
//     echo json_encode(['error' => 'Invalid request method or product id.']);
// }


//Add item to cart
function addToCart($product_id, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION["cart"][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    // Placeholder: Fetch product details from the database based on $productId
    // Replace the following line with your actual logic
    echo "Added item with id $product_id to the cart.";
}

//Update item in cart
function updateQuantity($product_id, $quantity) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

//Remove item from cart
function removeFromCart($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Display cart
function displayCart() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Placeholder: Fetch product details from the database based on $productId
            // Replace the following line with your actual logic
            echo "Product ID: $product_id, Quantity: $quantity\n";
        }
    } else {
        echo "Your cart is empty.";
    }
}

//Checkout
function checkout() {
    $_SESSION['cart'] = array();
}


