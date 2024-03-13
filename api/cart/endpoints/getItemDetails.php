<?php
// Error reporting for debugging (remove or turn off error displaying in production)
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// require_once '../shopping-cart.php';

// Function to search through all categories for an item
function findItemById($item_id) {
    // Manually specify the relative paths to your category data files
    $categoryFiles = [
        __DIR__ . "../../items/data/armors.php",
        __DIR__ . "../../items/data/weapons.php", 
        __DIR__ . "../../items/data/shields.php",
        __DIR__ . "../../items/data/potions.php",
        __DIR__ . "../../items/data/grimoires.php",
    ];

    foreach ($categoryFiles as $file) {
        if (file_exists($file)) {
            $items = include($file);
            foreach ($items as $item) {
                if ($item['item_id'] == $item_id) {
                    return $item;
                }
            }
        }
    }
    return ["error" => "Item not found with ID $item_id."];
}

// Handle request
$item_id = $_REQUEST['item_id'] ?? null;
if ($item_id !== null) {
    $response = findItemById($item_id);
} else {
    $response = ["error" => "No item ID provided."];
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit;
