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
        "id" => 21,
        "name" => "Health Potion",
        "price" => 99.99,
        "description" => "Health Potion, it is a potion that restores health.",
        "image_url" => "https://db4sgowjqfwig.cloudfront.net/campaigns/157632/assets/775857/potion_of_healing.png?1504791538"
    ),
    array(
        "id" => 22,
        "name" => "Mana Potion",
        "price" => 119.99,
        "description" => "Mana Potion, it is a potion that restores mana.",
        "image_url" => "https://i.etsystatic.com/26563387/r/il/ab7809/3257014705/il_fullxfull.3257014705_97ys.jpg"
    ),
    array(
        "id" => 23,
        "name" => "Stamina Potion",
        "price" => 79.99,
        "description" => "Health Potion, it is a potion that restores health.",
        "image_url" => "https://static.turbosquid.com/Preview/001318/313/3M/_Z.jpg"
    ),
    array(
        "id" => 24,
        "name" => "Love Potion",
        "price" => 199.99,
        "description" => "Love Potion, it is a potion that makes anyone instantly fall in love with you.",
        "image_url" => "https://i.pinimg.com/originals/0f/76/a5/0f76a5265f9152fab9267a06a0e916cc.jpg"
    ),
    array(
        "id" => 25,
        "name" => "Invisability Potion",
        "price" => 399.99,
        "description" => "Invisability Potion, it is a potion that makes you invisible.",
        "image_url" => "https://i.etsystatic.com/5522366/r/il/b1ac68/2693806365/il_794xN.2693806365_4f7a.jpg"
    ),
    array(
        "id" => 26,
        "name" => "Luck Potion",
        "price" => 49.99,
        "description" => "Luck Potion, it is a potion that makes you lucky.",
        "image_url" => "https://content.thirtyonewhiskey.com/wp-content/uploads/2019/12/27115529/00100lrPORTRAIT_00100_BURST20191231111006764_COVER-scaled.jpg"
    ),
);

echo json_encode($items_Potions);
return $items_Potions;