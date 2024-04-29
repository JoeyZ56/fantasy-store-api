<?php
// Set session cookie parameters and start the session
// function start_session()
// {
//     session_set_cookie_params([
//         'lifetime' => 0,  // Session cookie will expire when the browser is closed
//         'path' => '/',    // Available throughout the entire domain
//         'domain' => '',  // Adjust for production environment
//         'secure' => false,  // Set to true in production if using HTTPS
//         'httponly' => true,  // Enhances security by making cookies HTTP-only
//         'samesite' => 'Lax'  // Protects against CSRF in some contexts
//     ]);

//     if (session_status() == PHP_SESSION_NONE) {
//         session_start();
//     }
//     error_log("Session accessed in " . __FILE__ . " on line " . __LINE__);
//     error_log("Session ID: " . session_id());
//     error_log("Session Variables: " . print_r($_SESSION, true));
//     error_log("Cookies: " . print_r($_COOKIE, true));
// }

// // Call the function to start the session
// start_session();



//Production example:
$usableDomanins = [
    'https://fantasy-e-commerce-store.vercel.app/',
    'http://localhost:5173'
];

session_set_cookie_params([
    'lifetime' => 0,  // The cookie expires when the browser is closed
    'path' => '/',  // Available throughout the entire domain
    'domain' => $usableDomanins,  // Change to your domain, accessible on all subdomains
    'secure' => true,  // Ensure cookies are sent over HTTPS only
    'httponly' => true,  // Cookie not accessible via JavaScript (XSS protection)
    'samesite' => 'Strict'  // Strictly same site; no cross-site usage
]);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
