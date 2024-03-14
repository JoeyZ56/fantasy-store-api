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
        __DIR__ . "/../../items/data/armors.php" => "getArmorsItems",
        __DIR__ . "/../../items/data/weapons.php" => "getWeaponsItems", 
        __DIR__ . "/../../items/data/shields.php" => "getShieldsItems",
        __DIR__ . "/../../items/data/potions.php" => "getPotionsItems",
        __DIR__ . "/../../items/data/grimoires.php" => "getGrimoiresItems",
    ];

    foreach ($categoryFiles as $file => $functionName) {
        if (file_exists($file)) {
            include_once($file);
            if (function_exists($functionName)) {
                $items = $functionName(); // Call the function to get the items array
                foreach ($items as $item) {
                    if ($item['item_id'] == $item_id) {
                        return $item;
                    }
                }
            } else {
                error_log("Function $functionName does not exist.");
            }
        } else {
            error_log("File not found: $file");
        }
    }

    return ["error" => "Item not found with ID $item_id."];
}