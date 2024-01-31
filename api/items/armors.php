<?php

//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');


// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');


//Armor
$items_Armor = array(
    array(
        "id" => 1,
        "name" => "Dark Steel Set",
        "price" => 2999.99,
        "description" => "Dark Steel Set, it is a heavy armor set that provides high defense and is used by knights.",
        "image_url" => "https://cdn.ecommercedns.uk/files/9/210639/8/1250638/negroli-set-dark-steel-2.jpg"
    ),
    array(
        "id" => 2,
        "name" => "Bronze Steel Set",
        "price" => 2699.99,
        "description" => "Bronze Steel Set, it is a heavy armor set that provides high defense and is used by Kings Guards.",
        "image_url" => "https://cdn.ecommercedns.uk/files/9/210639/0/1250640/negroli-set-bronze.jpg"
    ),
    array(
        "id" => 3,
        "name" => "Steel Set",
        "price" => 1899.99,
        "description" => "Basic Steel Set, it is a heavy armor set that provides high defense and is used by Soldiers.",
        "image_url" => "http://cdn.ecommercedns.uk/files/9/210639/1/2049691/gothic-armour-set-steel-finish-1a.jpg"
    ),
    array(
        "id" => 4,
        "name" => "Nordic Leather Set",
        "price" => 3199.99,
        "description" => "Nordic Leather Set, it is a light armor set that provides high defense and is used by Vikings.",
        "image_url" => "https://www.blackravenarmoury.com/wp-content/uploads/2018/05/Odinson-Gilded-Full-Set.jpg"
    ),
    array(
        "id" => 5,
        "name" => "Leather & Chainmail Set",
        "price" => 2799.99,
        "description" => "Leather & Chainmail Set, it is a light armor set that provides high defense and is used by Foot Soldiers.",
        "image_url" => "https://i.pinimg.com/originals/bc/58/27/bc582755f39eac96c2e9a86a1ed14f74.jpg"
    ),
    array(
        "id" => 6,
        "name" => "Assassin Set",
        "price" => 1499.99,
        "description" => "Assassin Set, it is a light armor set that provides high defense and is used by Assassins.",
        "image_url" => "https://i.etsystatic.com/18044352/r/il/74f5a2/3872424707/il_fullxfull.3872424707_6xy1.jpg"
    ),
    array(
        "id" => 7,
        "name" => "Nordic Winter Set",
        "price" => 700,
        "description" => "Nordic Winter Set, it is a Heavy armor set that provides high defense and is used by Vikings.",
        "image_url" => "https://i.pinimg.com/originals/4a/33/f6/4a33f6722e8d12cf410df832e9d90a19.jpg"
    ),
    array(
        "id" => 8,
        "name" => "Female Ranger Set",
        "price" => 2199.99,
        "description" => "Female Ranger Set, it is a light armor set that provides high defense and is used by Rangers.",
        "image_url" => "https://i.pinimg.com/originals/6d/6f/36/6d6f36c1847f7c63c542b66ba4f130d9.jpg"
    ),
);


echo json_encode($items_Armor);