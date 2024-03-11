<?php

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

require_once '../../cart/shopping-cart.php'; // Assuming this file contains functions like displayCart

$response = displayCart(); // Fetch cart contents, which handles both empty and non-empty carts

header('Content-Type: application/json');
echo json_encode($response);
exit;