<?php
//Production: https://fantasy-e-commerce-store.vercel.app/

//CORs
$allowedOrigin = 'http://localhost:5173';
header('Access-Control-Allow-Origin: ' . $allowedOrigin);
header('Access-control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

//Preflight Request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Content-Type: application/json');
    http_response_code(204); //indicate that the request was successfully processed, but the server is not returning any content
    exit();
}
