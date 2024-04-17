<?php
require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../data/potions.php';

$potions = getPotionsItems();
header('Content-Type: application/json');
echo json_encode($potions);
exit;
