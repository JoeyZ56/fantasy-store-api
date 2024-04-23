<?php

//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');


//Armor
function getArmorsItems($search = '')
{
    $Armors = array(
        array(
            "item_id" => 1,
            "name" => "Knights Armor Set",
            "price" => 5999.99,
            "description" => "Steel Set, it is a heavy armor set that provides high defense.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/knightsarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 2,
            "name" => "Paladin Armor Set",
            "price" => 7777.77,
            "description" => "Steel & Gold Set, it is a heavy armor set that provides high defense and is used by Paladins.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/paladinarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 3,
            "name" => "Flame Armor Set",
            "price" => 7999.99,
            "description" => "Steel & Fire Set, it is a heavy armor set that provides high defense to fire.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/firearmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 4,
            "name" => "Ice Armor Set",
            "price" => 7999.99,
            "description" => "Steel & Ice Set, it is a heavy armor set that provides high defense to ice and cold resistant.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/icearmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 5,
            "name" => "Water Armor Set",
            "price" => 8999.99,
            "description" => "Steel & Water Set, it is a heavy armor set that provides high defense to water and give the user the ability to breath under water.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/waterarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 6,
            "name" => "Rock Armor Set",
            "price" => 9999.99,
            "description" => "Steel & Rock Set, it is a heavy armor set that provides extremely high defense and is used by Tanks.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/rockarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 7,
            "name" => "Lightning Armor Set",
            "price" => 13999.99,
            "description" => "Steel & Lightning Set, it is a heavy armor set that provides high defense to lightning and give the user the ability to move faster.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/lightningarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 8,
            "name" => "Shadow Armor Set",
            "price" => 14999.99,
            "description" => "Steel & Shadow Set, it is a heavy armor set that provides high defense to shadow and give the user the ability to teleport through shadows.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/shadowarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 9,
            "name" => "Necromancer Armor Set",
            "price" => 21999.99,
            "description" => "Steel & Dark Set, it is a heavy armor set that provides high defense to dark and give the user the ability to summon common undead creatures.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/necromancerarmorset.webp",
            "category" => "armors"
        ),
        array(
            "item_id" => 10,
            "name" => "Demon Armor Set",
            "price" => 29999.99,
            "description" => "Steel & Demon Set, it is a heavy armor set that provides high defense to dark and give the user the ability to summon common demons.",
            "image_url" => "http://localhost/fantasy-store-api/api/assets/armors/demonarmorset.webp",
            "category" => "armors"
        ),
    );

    if (!empty($search)) {
        $filtered = array_filter($Armors, function ($item) use ($search) {
            return stripos($item['name'], $search) !== false;
        });
        return $filtered;
    }

    return $Armors;
};
