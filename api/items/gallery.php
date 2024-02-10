<?php
// Enable error reporting for debugging


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

define('FROM_GALLERY', true);

// Include all item files
$itemFiles = ['armors.php', 'weapons.php', 'shields.php', 'potions.php', 'grimoires.php'];

$galleryImages = [];

foreach ($itemFiles as $file) {
    $filePath = __DIR__ . '/' . $file; 
    if (file_exists($filePath)) {
        $items = include($filePath);
        foreach ($items as $item) {
            
            $galleryImages[] = [
                'item_id' => $item['item_id'],
                'name' => $item['name'],
                'image_url' => $item['image_url'],
            ];
        }
    } else {
        // Handle error or log if file doesn't exist
        error_log("File not found: $filePath");
    }
}

// header('Content-Type: application/json');
echo json_encode($galleryImages); 
exit;
