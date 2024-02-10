<?php
// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
require_once("../database/database.php");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Begin transaction
$mysqli->begin_transaction();



try {
    $itemTypes = [
        'armors' => 'armors.php',
        'grimoires' => 'grimoires.php',
        'potions' => 'potions.php', 
        'shields' => 'shields.php', 
        'weapons' => 'weapons.php'
    ];

    foreach ($itemTypes as $category => $filePath) {
        require_once $filePath;
        $functionName = "get" . ucfirst($category) . "Items";
        $items = $functionName();

        // Debug: Confirm items are fetched
        echo "Fetching items from $category: " . count($items) . " items found\n";

        foreach ($items as $item) {
            $query = "INSERT INTO items (name, description, price, image_url, category) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ssdss", $item['name'], $item['description'], $item['price'], $item['image_url'], $category);
            
            // Try to execute the prepared statement
            if (!$stmt->execute()) {
                // If execution fails, output an error and break the loop
                echo "Execute error for $category: " . $stmt->error;
                // Optionally, you can stop the script or handle the error as needed
                break;
            }
            
            // Close the statement after execution to free up resources
            $stmt->close();
        }
        

        echo ucfirst($category) . " items have been inserted successfully!\n";
    }

    // Commit the transaction
    $mysqli->commit();
    echo "All items have been successfully inserted into the database.\n";
} catch (Exception $e) {
    // An error occurred, roll back the transaction
    $mysqli->rollback();
    echo "Transaction rolled back due to an error: " . $e->getMessage();
}

// Always close the database connection when done
$mysqli->close();
