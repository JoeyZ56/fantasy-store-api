<?php
session_start();

//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CORs
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: *');

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");



//clear all session variables
$_SESSION = [];

//destroy the session
session_destroy();

header('Content-Type: application/json');
//respond with a JSON message
echo json_encode(["success" => true, "message" => "Logged out successfully",
    "redirect" => "http://localhost:5173/"]);

exit;