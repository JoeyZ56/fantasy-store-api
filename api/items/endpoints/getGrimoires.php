<?php
require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../data/grimoires.php';

$grimoires = getGrimoiresItems();
header('Content-Type: application/json');
echo json_encode($grimoires);
exit;
