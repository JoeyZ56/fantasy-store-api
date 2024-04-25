<?php
session_start();
$_SESSION['test'] = 'Session Test Successful';
echo 'Session has been set. Go to test_check.php now.';
