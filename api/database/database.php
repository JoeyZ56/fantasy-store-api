<?php

$host = 'localhost';
$dbname = 'fantasy-store';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " 
    . $mysqli->connect_error;
}