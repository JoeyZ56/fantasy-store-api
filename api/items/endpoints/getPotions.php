<?php

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once '../data/potions.php';

$potions = getPotionsItems();
header('Content-Type: application/json');
echo json_encode($potions);
exit;