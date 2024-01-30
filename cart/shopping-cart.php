<?php

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

    // Placeholder: In a real scenario, you might fetch details from your configured items
    $itemDetails = getItemDetails($product_id);

    echo json_encode([
        "message" => "Added item to the cart.",
        "item_details" => $itemDetails
    ]);
}

// Display cart
function displayCart() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cartDetails = getCartDetails($_SESSION['cart']);
        echo json_encode($cartDetails);
    } else {
        echo json_encode(["message" => "Your cart is empty."]);
    }
}

// Placeholder: In a real scenario, you might fetch details from your configured items
function getItemDetails($product_id) {
    // Fetch item details based on $product_id from the respective item file
    $itemCategory = getItemCategory($product_id);
    $itemFile = "items/$itemCategory.php";

    if (file_exists($itemFile)) {
        $items = include($itemFile);
        return $items[$product_id - 1]; // Assuming $product_id is the array index
    } else {
        return ["error" => "Item category file not found."];
    }
}

// Placeholder: In a real scenario, you might fetch details from your configured items
function getCartDetails($cart) {
    $cartDetails = array();

    foreach ($cart as $product_id => $quantity) {
        $itemDetails = getItemDetails($product_id);
        $itemDetails['quantity'] = $quantity;
        $cartDetails[] = $itemDetails;
    }

    return $cartDetails;
}

// Helper function to determine item category
function getItemCategory($product_id) {
    // This is a placeholder; you might have a better logic based on your structure
    if ($product_id <= 3) {
        return 'armors';
    } elseif ($product_id <= 6) {
        return 'grimoires';
    } elseif ($product_id <= 9) {
        return 'potions';
    } elseif ($product_id <= 12) {
        return 'shields';
    } else {
        return 'weapons';
    }
}
