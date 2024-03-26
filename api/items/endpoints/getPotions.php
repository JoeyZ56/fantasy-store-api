<?php

//CORS
// Set the specific origin instead of wildcard
header('Access-Control-Allow-Origin: hhttps://fantasy-e-commerce-store.vercel.app');
// Allow credentials
header('Access-Control-Allow-Credentials: true');

// Add headers to handle preflight requests 
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Accept requests from the specified origin with credentials
    header('Access-Control-Allow-Origin: https://fantasy-e-commerce-store.vercel.app');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    exit(0); 
}

require_once '../data/potions.php';

$potions = getPotionsItems();
header('Content-Type: application/json');
echo json_encode($potions);
exit;