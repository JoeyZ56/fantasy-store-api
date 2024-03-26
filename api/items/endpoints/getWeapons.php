<?php

//CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once '../data/weapons.php';

$weapons = getWeaponsItems();
header('Content-Type: application/json');
echo json_encode($weapons);
exit;