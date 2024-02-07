<?php
//Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');




// Grimoires
function getGrimoireItems(){
$Grimoires = array(
    array(
        "id" => 11,
        "name" => "Fire Grimoire",
        "price" => 499.99,
        "description" => "Fire Grimoire, it is a grimoire that contains fire spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/firegrimoire.webp"
    ),
    array(
        "id" => 12,
        "name" => "Ice Grimoire",
        "price" => 499.99,
        "description" => "Ice Grimoire, it is a grimoire that contains ice spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/icegrimoire.webp"
    ),
    array(
        "id" => 13,
        "name" => "Water Grimoire",
        "price" => 499.99,
        "description" => "Water Grimoire, it is a grimoire that contains water spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/watergrimoire.webp"
    ),
    array(
        "id" => 14,
        "name" => "Earth Grimoire",
        "price" => 499.99,
        "description" => "Earth Grimoire, it is a grimoire that contains earth spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/earthgrimoire.webp"
    ),
    array(
        "id" => 15,
        "name" => "Wind Grimoire",
        "price" => 499.99,
        "description" => "Wind Grimoire, it is a grimoire that contains wind spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/windgrimoire.webp"
    ),
    array(
        "id" => 16,
        "name" => "Lighting Grimoire",
        "price" => 599.99,
        "description" => "Lighting Grimoire, it is a grimoire that contains lighting spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/lightinggrimoire.webp"
    ),
    array(
        "id" => 17,
        "name" => "Arcane Grimoire",
        "price" => 699.99,
        "description" => "Lighting Grimoire, it is a grimoire that contains lighting spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/arcanegrimoire.webp"
    ),
    array(
        "id" => 18,
        "name" => "Shadow Grimoire",
        "price" => 599.99,
        "description" => "Shadow Grimoire, it is a grimoire that contains shadow spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/shadowgrimoire.webp"
    ),
    array(
        "id" => 19,
        "name" => "Necromancy Grimoire",
        "price" => 699.99,
        "description" => "Necromancy Grimoire, it is a grimoire that contains necromancy spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/necromancygrimoire.webp"
    ),
    array(
        "id" => 20,
        "name" => "Demonic Summoning Grimoire",
        "price" => 999.99,
        "description" => "Demonic Summoning Grimoire, it is a grimoire that contains demonic summoning spells.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/grimoires/demongrimoire.webp"
    ),
);

return $Grimoires;

};


if (!defined('FROM_GALLERY')) {
    header('Content-Type: application/json');
    echo json_encode(getGrimoireItems());
}

return getGrimoireItems();