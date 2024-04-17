<?php
// Set CORS headers
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Respond to preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return only the headers and not the content
    // Only allow CORS if we're doing a preflight request
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: application/json');
    http_response_code(204);
    exit;
}

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}
