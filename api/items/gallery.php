<?php
ob_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Include all item files
$itemFiles = ['armors.php', 'weapons.php', 'shields.php', 'potions.php', 'grimoires.php'];

$galleryImages = [];

foreach ($itemFiles as $file) {
    $filePath = __DIR__ . '/' . $file; // Adjust __DIR__ if necessary to point to the correct directory
    if (file_exists($filePath)) {
        $items = include($filePath);
        foreach ($items as $item) {
            // Assuming each item has an 'id', 'name', and 'image_url'
            $galleryImages[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'image_url' => $item['image_url'],
            ];
        }
    } else {
        // Handle error or log if file doesn't exist
        error_log("File not found: $filePath");
    }
}

ob_get_clean(); // Discard any output buffered before this point
echo json_encode($galleryImages); // Corrected variable name
exit;
