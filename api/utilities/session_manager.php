<?php
// Set session cookie parameters and start the session
function start_session()
{
    session_set_cookie_params([
        'lifetime' => 0,  // Session cookie will expire when the browser is closed
        'path' => '/',    // Available throughout the entire domain
        'domain' => 'localhost',  // Adjust for production environment
        'secure' => false,  // Set to true in production if using HTTPS
        'httponly' => true,  // Enhances security by making cookies HTTP-only
        'samesite' => 'Lax'  // Protects against CSRF in some contexts
    ]);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

// Call the function to start the session
start_session();



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
