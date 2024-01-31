<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
echo "Hello, CORS is working!";
