<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//Potions
function getPotionsItems($search = '')
{
    $Potions = array(
        array(
            "item_id" => 21,
            "name" => "Health Potion",
            "price" => 99.99,
            "description" => "Health Potion, it is a potion that restores health.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/healthpotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 22,
            "name" => "Mana Potion",
            "price" => 119.99,
            "description" => "Mana Potion, it is a potion that restores mana.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/manapotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 23,
            "name" => "Stamina Potion",
            "price" => 79.99,
            "description" => "Stamina Potion, it is a potion that restores stamina.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/staminapotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 24,
            "name" => "Strength Potion",
            "price" => 199.99,
            "description" => "Strength Potion, it is a potion that makes you stronger.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/strengthpotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 25,
            "name" => "Fire Resistance Potion",
            "price" => 99.99,
            "description" => "Fire Resistance Potion, it is a potion that makes you resistant to fire.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/fireresistancepotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 26,
            "name" => "Love Potion",
            "price" => 999.99,
            "description" => "Love Potion, it is a potion that makes anyone instantly fall in love with you.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/lovepotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 27,
            "name" => "Invisability Potion",
            "price" => 999.99,
            "description" => "Invisability Potion, it is a potion that makes you invisible.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/invisabilitypotion.webp",
            "category" => "potions"
        ),
        array(
            "item_id" => 28,
            "name" => "Luck Potion",
            "price" => 777.77,
            "description" => "Luck Potion, it is a potion that makes you lucky.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/potions/luckpotion.webp",
            "category" => "potions"
        ),
    );

    if (!empty($search)) {
        $filtered = array_filter($Potions, function ($item) use ($search) {
            return strpos($item['name'], $search) !== false;
        });
        return $filtered;
    }

    return $Potions;
};
