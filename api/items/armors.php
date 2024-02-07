<?php

//Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');


// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');



//Armor
function getArmorItems(){
$Armors = array(
    array(
        "id" => 1,
        "name" => "Knights Armor Set",
        "price" => 2999.99,
        "description" => "Dark Steel Set, it is a heavy armor set that provides high defense and is used by knights.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/knightsarmorset.webp"
    ),
    array(
        "id" => 2,
        "name" => "Paladin Armor Set",
        "price" => 2699.99,
        "description" => "Bronze Steel Set, it is a heavy armor set that provides high defense and is used by Kings Guards.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/paladinarmorset.webp"
    ),
    array(
        "id" => 3,
        "name" => "Flame Armor Set",
        "price" => 1899.99,
        "description" => "Basic Steel Set, it is a heavy armor set that provides high defense and is used by Soldiers.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/firearmorset.webp"
    ),
    array(
        "id" => 4,
        "name" => "Ice Armor Set",
        "price" => 3199.99,
        "description" => "Nordic Leather Set, it is a light armor set that provides high defense and is used by Vikings.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/icearmorset.webp"
    ),
    array(
        "id" => 5,
        "name" => "Water Armor Set",
        "price" => 2799.99,
        "description" => "Leather & Chainmail Set, it is a light armor set that provides high defense and is used by Foot Soldiers.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/waterarmorset.webp"
    ),
    array(
        "id" => 6,
        "name" => "Rock Armor Set",
        "price" => 1499.99,
        "description" => "Assassin Set, it is a light armor set that provides high defense and is used by Assassins.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/rockarmorset.webp"
    ),
    array(
        "id" => 7,
        "name" => "Lightning Armor Set",
        "price" => 700,
        "description" => "Nordic Winter Set, it is a Heavy armor set that provides high defense and is used by Vikings.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/lightningarmorset.webp"
    ),
    array(
        "id" => 8,
        "name" => "Shadow Armor Set",
        "price" => 2199.99,
        "description" => "Female Ranger Set, it is a light armor set that provides high defense and is used by Rangers.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/shadowarmorset.webp"
    ),
    array(
        "id" => 9,
        "name" => "Necromancer Armor Set",
        "price" => 2199.99,
        "description" => "Female Ranger Set, it is a light armor set that provides high defense and is used by Rangers.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/necromancerarmorset.webp"
    ),
    array(
        "id" => 10,
        "name" => "Demon Armor Set",
        "price" => 2199.99,
        "description" => "Female Ranger Set, it is a light armor set that provides high defense and is used by Rangers.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/demonarmorset.webp"
    ),
);

return $Armors;

};

if (!defined('FROM_GALLERY')) {
    header('Content-Type: application/json');
    echo json_encode(getArmorItems());
    exit();
}

return getArmorItems();



