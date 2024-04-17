<?php
require_once '../../utilities/session_setting.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//CORs
require_once '../../utilities/cors_header.php';

require_once '../data/weapons.php';

$weapons = getWeaponsItems();
header('Content-Type: application/json');
echo json_encode($weapons);
exit;
