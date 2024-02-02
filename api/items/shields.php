<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');


//Shields
$items_Shields = array(
    array(
        "id" => 18,
        "name" => "Bronze lion Shield",
        "price" => 899.99,
        "description" => "Bronze lion Shield, it is a heavy shield that provides high defense and is used by Kings Guards.",
        "image_url" => "https://i.etsystatic.com/24524275/r/il/3c7e44/3094892427/il_fullxfull.3094892427_l9ly.jpg"
    ),
    array(
        "id" => 19,
        "name" => "Knights Shield",
        "price" => 799.99,
        "description" => "Knights Shield, it is a heavy shield that provides high defense and is used by knights.",
        "image_url" => "https://i.etsystatic.com/18181025/r/il/f92977/3038074447/il_1588xN.3038074447_kz9f.jpg"
    ),
    array(
        "id" => 20,
        "name" => "Dark Steel Shield",
        "price" => 499.99,
        "description" => "Dark Steel Shield, it is a heavy shield that provides high defense and is used by knights.",
        "image_url" => "https://i.pinimg.com/originals/75/38/7a/75387a1c3f6aa51a86c4c9d6481ba680.jpg"
    ),
);



return $items_Shields;