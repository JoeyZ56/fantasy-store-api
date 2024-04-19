<?php
require_once '../utilities/session_setting.php';
echo 'Session test value: ' . ($_SESSION['test'] ?? 'No session found');
