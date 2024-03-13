<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


// Define the base URL for your API endpoints
$baseUrl = 'http://localhost/fantasy-store-api/api/items/endpoints'; 

// Define API endpoints for each item type
$itemEndpoints = [
    'armors' => $baseUrl . '/getArmors.php',
    'weapons' => $baseUrl . '/getWeapons.php',
    'shields' => $baseUrl . '/getShields.php',
    'potions' => $baseUrl . '/getPotions.php',
    'grimoires' => $baseUrl . '/getGrimoires.php',
];

$galleryImages = [];

foreach ($itemEndpoints as $endpoint) {
    // Initialize cURL session
    $curl = curl_init($endpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    // Execute cURL request
    $response = curl_exec($curl);

    // Check for errors
    if (curl_errno($curl)) {
        error_log('cURL error: ' . curl_error($curl));
    } else {
        // Decode JSON response
        $items = json_decode($response, true);
        if (is_array($items)) {
            foreach ($items as $item) {
                $galleryImages[] = [
                    'item_id' => $item['item_id'],
                    'name' => $item['name'],
                    'image_url' => $item['image_url'],
                ];
            }
        }
    }

    // Close cURL session
    curl_close($curl);
}

header('Content-Type: application/json');
echo json_encode($galleryImages);
exit;
