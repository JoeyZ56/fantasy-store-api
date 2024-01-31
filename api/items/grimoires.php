<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-type: application/json');

// Grimoires
$items_Grimoires = array(
    array(
        "id" => 27,
        "name" => "Demonic Grimoire",
        "price" => 99.99,
        "description" => "Demonic Grimoire, it is a grimoire that contains demonic spells.",
        "image_url" => "https://static.turbosquid.com/Preview/2015/03/09__18_17_26/1.png2af64f20-5f72-4fa4-b4cf-2e803b783eeeOriginal.jpg"
    ),
    array(
        "id" => 28,
        "name" => "Demonic Grimoire",
        "price" => 99.99,
        "description" => "Demonic Grimoire, it is a grimoire that contains demonic spells.",
        "image_url" => "https://static.turbosquid.com/Preview/2015/03/09__18_17_26/1.png2af64f20-5f72-4fa4-b4cf-2e803b783eeeOriginal.jpg"
    ),
    array(
        "id" => 29,
        "name" => "Shadow Grimoire",
        "price" => 99.99,
        "description" => "Shadow Grimoire, it is a grimoire that contains shadow spells.",
        "image_url" => "https://64.media.tumblr.com/8335dac03c0d3ea8ab90e7d11df54781/tumblr_oy0hfgQGs31qas1mto7_1280.jpg"
    ),
    array(
        "id" => 30,
        "name" => "Arcane Grimoire",
        "price" => 99.99,
        "description" => "Acrcane Grimoire, it is a grimoire that contains arcane spells.",
        "image_url" => "https://i.pinimg.com/736x/8f/8a/b5/8f8ab5448157f4b337fda8eca56b4bd8.jpg"
    ),
);



echo json_encode($items_Grimoires);