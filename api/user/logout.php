<?php

//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

session_start();

//clear all session variables
$_SESSION = [];

//destroy the session
session_destroy();

//respond with a JSON message
echo json_encode(["success" => true, "message" => "Logged out successfully",
    "redirect" => "http://localhost:5173/"]);

exit;