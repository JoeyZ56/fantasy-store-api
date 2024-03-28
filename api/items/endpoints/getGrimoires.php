<?php
session_start();

//Development
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

//CORS
// header('Access-Control-Allow-Origin: https://fantasy-e-commerce-store.vercel.app');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');


require_once '../data/grimoires.php';

$grimoires = getGrimoiresItems();
header('Content-Type: application/json');
echo json_encode($grimoires);
exit;