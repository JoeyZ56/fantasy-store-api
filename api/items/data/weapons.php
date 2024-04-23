<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//Weapons  
function getWeaponsItems($search = '')
{
    $Weapons = array(
        array(
            "item_id" => 34,
            "name" => "Fire elemetal Sword",
            "price" => 2999.99,
            "description" => "Fire elemetal Sword, it is a heavy sword that provides fire damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/flamesword.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 35,
            "name" => "Ice Flail",
            "price" => 2899.99,
            "description" => "Ice Flail, it is a heavy flail that provides ice damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/iceflail.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 36,
            "name" => "Lighting Rapier",
            "price" => 1799.99,
            "description" => "Lighting Rapier, it is a light rapier that provides lighting damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/lightningrapier.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 37,
            "name" => "Wind Short Bow",
            "price" => 1499.99,
            "description" => "Wind Short Bow, it is a mid ranged weapon that provides wind damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/windbow.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 38,
            "name" => "Magma Great Hammer",
            "price" => 4699.99,
            "description" => "Magma Great Hammer, it is a heavy hammer that provides fire damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/magmagreathammer.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 39,
            "name" => "Shadow Scythe",
            "price" => 6999.99,
            "description" => "Shadow Scythe, it is a heavy scythe that provides shadow damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/shadowscythe.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 40,
            "name" => "Earth Axe",
            "price" => 2399.99,
            "description" => "Earth Axe, it is a one handed axe that provides earth damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/earthaxe.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 41,
            "name" => "Water Spear",
            "price" => 1399.99,
            "description" => "Water Spear, it is a light spear that provides water damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/waterspear.webp",
            "category" => "weapons"
        ),
        array(
            "item_id" => 42,
            "name" => "Elemental Staff",
            "price" => 8999.99,
            "description" => "Elemental Staff, it is a staff that provides elemental damage.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/weapons/elementalstaff.webp",
            "category" => "weapons"
        ),
    );

    if (!empty($search)) {
        $filtered = array_filter($Weapons, function ($item) use ($search) {
            return stripos($item['name'], $search) !== false;
        });
        return $filtered;
    }

    return $Weapons;
}
