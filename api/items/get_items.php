<?php

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

include_once("../database/database.php");

//fetch items
$itemQuery = "SELECT * FROM items";
$itemResult = $mysqli->query($itemQuery);

$items =[];

if ($itemResult->num_rows > 0) {
    while($row = $itemResult->fetch_assoc()) {
        $items[] =$row;
    }
}

//output items as JSON
header('Content-type: application/json');
echo json_encode($items);

//close connection
$mysqli->close();