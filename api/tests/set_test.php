<?php
require_once '../utilities/session_setting.php';
$_SESSION['test'] = 'Session is set';
echo 'Session set. Navigate to check_test.php to test retrieval.';
