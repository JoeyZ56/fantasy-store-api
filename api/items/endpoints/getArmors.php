<?php
// require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../data/armors.php';

$query = isset($_GET['search']) ? $_GET['search'] : '';

$armors = getArmorsItems();
header('Content-Type: application/json');
echo json_encode($armors);
exit;
