<?php

//CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once '../data/armors.php'; 

$armors = getArmorsItems();
header('Content-Type: application/json');
echo json_encode($armors);
exit;