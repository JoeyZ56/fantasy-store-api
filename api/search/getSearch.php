<?php
require_once '../../utilities/cors_header.php';
require_once '../../database/database.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare a statement for safer execution
$stmt = $mysqli->prepare("SELECT * FROM items WHERE name LIKE ?");

// Check for errors in preparation
if ($stmt === false) {
    die("MySQL prepare error: " . $mysqli->error);
}

// Bind the input parameter, search term
$searchLike = '%' . $searchTerm . '%';
$stmt->bind_param('s', $searchLike);

// Execute the query
$stmt->execute();

// Bind the result to variables (if needed) or fetch
$result = $stmt->get_result();

$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

$stmt->close();

header('Content-Type: application/json');
echo json_encode($items);
