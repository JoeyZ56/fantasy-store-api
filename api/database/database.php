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

//fetch user
$userQuery = "SELECT * FROM user";
$userResult = $mysqli->query($userQuery);

//fetch items
$itemQuery = "SELECT * FROM items";
$itemResult = $mysqli->query($itemQuery);

//fetch cart

//fetch orders

//fetch order items

//fetch user orders

//close connection
$mysqli->close();