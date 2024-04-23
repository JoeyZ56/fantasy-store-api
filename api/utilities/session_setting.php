<?php
// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 0,  // Session cookie will expire when the browser is closed
    'path' => '/',  // Available throughout the entire domain
    'domain' => 'localhost',  // Can be '.yourdomain.com' for production
    'secure' => false,  // Set to true in production if using HTTPS
    'httponly' => true,  // Accessible only through the HTTP protocol
    'samesite' => 'Lax'  // Protects against CSRF attacks in some contexts

]);
// error_log("Session Cookie Params: " . json_encode(session_get_cookie_params()));

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_log("Session started with ID: " . session_id());
    error_log("Cookies sent: " . json_encode($_COOKIE));
    error_log("Session data retrieved: " . print_r($_SESSION, true));
}



//Production example:
/*
session_set_cookie_params([
    'lifetime' => 0,  // The cookie expires when the browser is closed
    'path' => '/',  // Available throughout the entire domain
    'domain' => '.yourdomain.com',  // Change to your domain, accessible on all subdomains
    'secure' => true,  // Ensure cookies are sent over HTTPS only
    'httponly' => true,  // Cookie not accessible via JavaScript (XSS protection)
    'samesite' => 'Strict'  // Strictly same site; no cross-site usage
]);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

*/
