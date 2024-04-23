<?php
// require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../data/shields.php';

$query = isset($_GET['search']) ? $_GET['search'] : '';

$shields = getShieldsItems();
header('Content-Type: application/json');
echo json_encode($shields);
exit;
