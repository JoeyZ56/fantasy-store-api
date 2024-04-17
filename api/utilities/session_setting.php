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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
