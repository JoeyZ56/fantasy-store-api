<?php
require_once '../../utilities/session_setting.php';
require_once '../../utilities/cors_header.php';
require_once '../data/armors.php';

$armors = getArmorsItems();
header('Content-Type: application/json');
echo json_encode($armors);
exit;


//does these endpoints need a session if 
//its just tranfering data as json for the frontend?