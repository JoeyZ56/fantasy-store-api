<?php
require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../data/weapons.php';

$weapons = getWeaponsItems();
header('Content-Type: application/json');
echo json_encode($weapons);
exit;
