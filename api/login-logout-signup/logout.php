<?php

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

session_start();

session_destroy();

echo "Logged out successfully";

exit;