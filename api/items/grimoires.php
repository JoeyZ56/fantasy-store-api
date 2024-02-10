<?php
//Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');




// Grimoires
function getGrimoiresItems(){
$Grimoires = array(
    array(
        "item_id" => 11,
        "name" => "Fire Grimoire",
        "price" => 1299.99,
        "description" => "Fire Grimoire, it is a grimoire that contains fire spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/firegrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 12,
        "name" => "Ice Grimoire",
        "price" => 1299.99,
        "description" => "Ice Grimoire, it is a grimoire that contains ice spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/icegrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 13,
        "name" => "Water Grimoire",
        "price" => 1299.99,
        "description" => "Water Grimoire, it is a grimoire that contains water spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/watergrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 14,
        "name" => "Earth Grimoire",
        "price" => 1299.99,
        "description" => "Earth Grimoire, it is a grimoire that contains earth spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/earthgrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 15,
        "name" => "Wind Grimoire",
        "price" => 1299.99,
        "description" => "Wind Grimoire, it is a grimoire that contains wind spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/windgrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 16,
        "name" => "Lighting Grimoire",
        "price" => 1499.99,
        "description" => "Lighting Grimoire, it is a grimoire that contains lighting spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/lightinggrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 17,
        "name" => "Arcane Grimoire",
        "price" => 1999.99,
        "description" => "Lighting Grimoire, it is a grimoire that contains lighting spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/arcanegrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 18,
        "name" => "Shadow Grimoire",
        "price" => 3999.99,
        "description" => "Shadow Grimoire, it is a grimoire that contains shadow spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/shadowgrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 19,
        "name" => "Necromancy Grimoire",
        "price" => 4999.99,
        "description" => "Necromancy Grimoire, it is a grimoire that contains necromancy spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/necromancygrimoire.webp",
        "category" => "grimoires"
    ),
    array(
        "item_id" => 20,
        "name" => "Demonic Summoning Grimoire",
        "price" => 9999.99,
        "description" => "Demonic Summoning Grimoire, it is a grimoire that contains demonic summoning spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/demongrimoire.webp",
        "category" => "grimoires"
    ),
);

return $Grimoires;

};


if (!defined('FROM_GALLERY')) {
    header('Content-Type: application/json');
    echo json_encode(getGrimoiresItems());
}

return getGrimoiresItems();