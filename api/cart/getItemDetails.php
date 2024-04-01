<?php
// Error reporting for debugging (remove or turn off error displaying in production)
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// Function to search through all categories for an item
function findItemById($item_id) {
    // Manually specify the relative paths to your category data files
    $categoryFiles = [
        __DIR__ . "/../items/data/armors.php" => "getArmorsItems",
        __DIR__ . "/../items/data/weapons.php" => "getWeaponsItems", 
        __DIR__ . "/../items/data/shields.php" => "getShieldsItems",
        __DIR__ . "/../items/data/potions.php" => "getPotionsItems",
        __DIR__ . "/../items/data/grimoires.php" => "getGrimoiresItems",
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