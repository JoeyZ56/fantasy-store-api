<?php
//Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');



//Shields
function getShieldsItems(){
$Shields = array(
    array(
        "item_id" => 29,
        "name" => "Dragon Shield",
        "price" => 3999.99,
        "description" => "Dragon Shield, it is a heavy shield that provides high defense, fire resistance, and can breath fire.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/dragonshield.webp",
        "category" => "shields"
    ),
    array(
        "item_id" => 30,
        "name" => "Knights Shield",
        "price" => 999.99,
        "description" => "Knights Shield, it is a heavy shield that provides high defense.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/knightsshield.webp",
        "category" => "shields"
    ),
    array(
        "item_id" => 31,
        "name" => "Iron Shield",
        "price" => 799.99,
        "description" => "Iron Shield, it is a heavy shield that provides high defense.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/ironshield.webp",
        "category" => "shields"
    ),
    array(
        "item_id" => 32,
        "name" => "Paladin Shield",
        "price" => 1499.99,
        "description" => "Paladin Shield, it is a heavy shield that provides high defense and boosts holy spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/paladinshield.webp",
        "category" => "shields"
    ),
    array(
        "item_id" => 33,
        "name" => "Viking Shield",
        "price" => 499.99,
        "description" => "Viking Shield, it is a medium shield that provides medium defense.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/vikingshield.webp",
        "category" => "shields"
    ),
);

return $Shields;
}


if (!defined('FROM_GALLERY')) {
    header('Content-Type: application/json');
    echo json_encode(getShieldsItems());
}

return getShieldsItems();