<?php
// Production: https://fantasy-e-commerce-store.vercel.app/

// Determine the origin of the request and set a controlled CORS policy
$allowedOrigins = [
    'https://fantasy-e-commerce-store.vercel.app', // Notice no trailing slash
    'http://localhost:5173' // Local development origin
];

// Use the Origin HTTP request header to dynamically set the allowed origin if it's in the list of allowed origins
if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
} else {
    // Optionally handle the unauthorized origin
    header('HTTP/1.1 403 Access Forbidden');
    echo 'You are not allowed to access this page.';
    exit; // Prevent further execution if the origin is not allowed
}

// Handle preflight requests for CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Content-Type: application/json');
    http_response_code(204); // Indicate that the request was successfully processed, but no content is returned
    exit();
}
