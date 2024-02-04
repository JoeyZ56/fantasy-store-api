<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');

//Potions
$items_Potions = array(
    array(
        "id" => 20,
        "name" => "Health Potion",
        "price" => 99.99,
        "description" => "Health Potion, it is a potion that restores health.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/healthpotion.webp"
    ),
    array(
        "id" => 21,
        "name" => "Mana Potion",
        "price" => 119.99,
        "description" => "Mana Potion, it is a potion that restores mana.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/manapotion.webp"
    ),
    array(
        "id" => 22,
        "name" => "Stamina Potion",
        "price" => 79.99,
        "description" => "Stamina Potion, it is a potion that restores stamina.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/staminapotion.webp"
    ),
    array(
        "id" => 23,
        "name" => "Strength Potion",
        "price" => 129.99,
        "description" => "Strength Potion, it is a potion that makes you stronger.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/strengthpotion.webp"
    ),
    array(
        "id" => 24,
        "name" => "Fire Resistance Potion",
        "price" => 79.99,
        "description" => "Fire Resistance Potion, it is a potion that makes you resistant to fire.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/fireresistancepotion.webp"
    ),
    array(
        "id" => 25,
        "name" => "Love Potion",
        "price" => 199.99,
        "description" => "Love Potion, it is a potion that makes anyone instantly fall in love with you.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/lovepotion.webp"
    ),
    array(
        "id" => 26,
        "name" => "Invisability Potion",
        "price" => 399.99,
        "description" => "Invisability Potion, it is a potion that makes you invisible.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/invisabilitypotion.webp"
    ),
    array(
        "id" => 27,
        "name" => "Luck Potion",
        "price" => 777.77,
        "description" => "Luck Potion, it is a potion that makes you lucky.",
        "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/luckpotion.webp"
    ),
);

echo json_encode($items_Potions);
return $items_Potions;