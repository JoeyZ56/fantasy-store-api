<?php
// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// Include necessary files and initialization code
require_once "../../cart/shopping-cart.php";

function getItemDetails($item_id) {
    $itemCategory = getItemCategory($item_id);
    $itemFile = __DIR__ . "/../data/$itemCategory.php";
;

    
    if (file_exists($itemFile)) {
        $items = include($itemFile);
        
        foreach ($items as $item) {
            if ($item['item_id'] == $item_id) {
                return $item;
            }
        }
        return ["error" => "Item not found with ID $item_id."];
    } else {
        return ["error" => "Item category file not found for $itemCategory."];
    }
}

// Assuming you receive `item_id` via GET or POST for simplicity
$item_id = $_REQUEST['item_id'] ?? null;

if ($item_id !== null) {
    // Assume getItemDetails function is adapted or included here
    $response = getItemDetails($item_id);
} else {
    $response = ["error" => "No item ID provided."];
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
