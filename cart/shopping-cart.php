<?php

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

//Initialize session
session_start();

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
            // Fetch product details from the database based on $productId
            // Display product details and quantity
        }
    } else {
        echo "Your cart is empty.";
    }
}

//Checkout
function checkout() {
    $_SESSION['cart'] = array();
}