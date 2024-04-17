<?php
require_once '../utilities/session_setting.php';
require_once '../utilities/cors_header.php';

//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//clear all session variables
$_SESSION = [];

//destroy the session
session_destroy();

header('Content-Type: application/json');
//respond with a JSON message
echo json_encode([
    "success" => true, "message" => "Logged out successfully",
    "redirect" => "http://localhost:5173/"
]);

exit;
