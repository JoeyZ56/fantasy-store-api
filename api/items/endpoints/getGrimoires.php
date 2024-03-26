<?php
//CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once '../data/grimoires.php';

$grimoires = getGrimoiresItems();
header('Content-Type: application/json');
echo json_encode($grimoires);
exit;