<?php

$host = 'localhost';
$dbname = 'fantasy-store';
$username = 'root';
$password = '';

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check for a connection error
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
