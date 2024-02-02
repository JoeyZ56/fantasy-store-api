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
        "id" => 9,
        "name" => "Dark Steel Sword",
        "price" => 999.99,
        "description" => "Dark Steel Sword, it is a heavy sword that provides high damage and is used by knights.",
        "image_url" => "https://www.thearmoury.shop/_uploads/img/products/giant/S5815.jpg"
    ),
    array(
        "id" => 10,
        "name" => "Bronze Steel Sword",
        "price" => 899.99,
        "description" => "Bronze Steel Sword, it is a heavy sword that provides high damage and is used by Kings Guards.",
        "image_url" => "https://cdn.shopify.com/s/files/1/0038/2789/2293/products/402-09_26afa161-991e-4554-825f-924770222711.jpg?v=1564575565"
    ),
    array(
        "id" => 11,
        "name" => "Steel Dagger",
        "price" => 799.99,
        "description" => "Basic Steel Sword, it is a heavy sword that provides high damage and is used by Soldiers.",
        "image_url" => "http://www.darksword-armory.com/wp-content/uploads/2016/05/black-prince-dagger-1811-medieval-dagger.jpg"
    ),
    array(
        "id" => 12,
        "name" => "Short Bow",
        "price" => 499.99,
        "description" => "Short Bow, it is a mid ranged weapon that provides high damage and is used by Rangers.",
        "image_url" => "https://i.pinimg.com/originals/6f/63/78/6f6378484c5b6475907f80e83a4d5ebb.jpg"
    ),
    array(
        "id" => 13,
        "name" => "Long Bow",
        "price" => 699.99,
        "description" => "Long Bow, it is a far ranged weapon that provides high damage and is used by Rangers.",
        "image_url" => "https://www.battlemerchant.com/images/product_images/original_images/0612186140_bogen_langbogen_longbow.jpg"
    ),
    array(
        "id" => 14,
        "name" => "Crossbow",
        "price" => 999.99,
        "description" => "Crossbow, it is a heavy crossbow that provides high damage and is used by Infantry.",
        "image_url" => "https://cdn.shopify.com/s/files/1/2080/1501/products/14thC_steel_crossbow_1.JPG?v=1518597730"
    ),
    array(
        "id" => 15,
        "name" => "Great Axe",
        "price" => 1399.99,
        "description" => "Two Handed Axe, it is a heavy axe that provides high damage and is used by Vikings.",
        "image_url" => "https://i.pinimg.com/originals/04/69/7b/04697bbfa2daac59ad080e08b098fc2f.jpg"
    ),
    array(
        "id" => 16,
        "name" => "Spear",
        "price" => 399.99,
        "description" => "Spear, it is a light spear that provides high damage and is used by Infantry.",
        "image_url" => "https://media.sketchfab.com/models/0168a9897b6f47a180e7d63dca25085f/thumbnails/427ae67baaa340af97880a3e5690b7a5/f74afb2f33dc45d5970ec130deb95755.jpeg"
    ),
    array(
        "id" => 17,
        "name" => "Mace",
        "price" => 899.99,
        "description" => "Mace, it is a heavy mace that provides high damage and is used by Infantry.",
        "image_url" => "https://img1.cgtrader.com/items/3125412/774280b861/medieval-mace-3d-model-low-poly-obj-fbx-blend.jpg"
    ),
   

);

echo json_encode($items_Weapons);
return $items_Weapons;