<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');


//Weapons   
$items_Weapons = array(
    array(
        "id" => 33,
        "name" => "Fire elemetal Sword",
        "price" => 999.99,
        "description" => "Fire elemetal Sword, it is a heavy sword that provides fire damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/flamesword.webp"
    ),
    array(
        "id" => 34,
        "name" => "Ice Flail",
        "price" => 899.99,
        "description" => "Ice Flail, it is a heavy flail that provides ice damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/iceflail.webp"
    ),
    array(
        "id" => 35,
        "name" => "Lighting Rapier",
        "price" => 799.99,
        "description" => "Lighting Rapier, it is a light rapier that provides lighting damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/lightningrapier.webp"
    ),
    array(
        "id" => 36,
        "name" => "Wind Short Bow",
        "price" => 499.99,
        "description" => "Wind Short Bow, it is a mid ranged weapon that provides wind damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/windbow.webp"
    ),
    array(
        "id" => 37,
        "name" => "Magma Great Hammer",
        "price" => 699.99,
        "description" => "Magma Great Hammer, it is a heavy hammer that provides fire damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/magmagreathammer.webp"
    ),
    array(
        "id" => 38,
        "name" => "Shadow Scythe",
        "price" => 999.99,
        "description" => "Shadow Scythe, it is a heavy scythe that provides shadow damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/shadowscythe.webp"
    ),
    array(
        "id" => 39,
        "name" => "Earth Axe",
        "price" => 1399.99,
        "description" => "Earth Axe, it is a one handed axe that provides earth damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/earthaxe.webp"
    ),
    array(
        "id" => 40,
        "name" => "Water Spear",
        "price" => 399.99,
        "description" => "Water Spear, it is a light spear that provides water damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/waterspear.webp"
    ),
    array(
        "id" => 41,
        "name" => "Elemental Staff",
        "price" => 899.99,
        "description" => "Elemental Staff, it is a staff that provides elemental damage.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/elementalstaff.webp"
    ),
   

);

echo json_encode($items_Weapons);
return $items_Weapons;