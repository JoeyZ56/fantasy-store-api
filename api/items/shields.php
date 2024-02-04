<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');


//Shields
$items_Shields = array(
    array(
        "id" => 28,
        "name" => "Dragon Shield",
        "price" => 899.99,
        "description" => "Bronze lion Shield, it is a heavy shield that provides high defense and is used by Kings Guards.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/dragonshield.webp"
    ),
    array(
        "id" => 29,
        "name" => "Knights Shield",
        "price" => 799.99,
        "description" => "Knights Shield, it is a heavy shield that provides high defense and is used by knights.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/knightsshield.webp"
    ),
    array(
        "id" => 30,
        "name" => "Iron Shield",
        "price" => 499.99,
        "description" => "Dark Steel Shield, it is a heavy shield that provides high defense and is used by knights.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/ironshield.webp"
    ),
    array(
        "id" => 31,
        "name" => "Paladin Shield",
        "price" => 499.99,
        "description" => "Dark Steel Shield, it is a heavy shield that provides high defense and is used by knights.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/paladinshield.webp"
    ),
    array(
        "id" => 32,
        "name" => "Viking Shield",
        "price" => 499.99,
        "description" => "Dark Steel Shield, it is a heavy shield that provides high defense and is used by knights.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/shields/vikingshield.webp"
    ),
);


echo json_encode($items_Shields);
return $items_Shields;