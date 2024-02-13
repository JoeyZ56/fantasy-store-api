<?php

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once '../data/shields.php';

$shields = getShieldsItems();
header('Content-Type: application/json');
echo json_encode($shields);
exit;