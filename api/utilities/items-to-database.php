<?php
// Error reporting setup
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
require_once("../database/database.php");

// Verify connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}



// Begin transaction for atomicity
$mysqli->begin_transaction();

try {
    // Define the item types and corresponding file paths
    $itemTypes = [
        
        'grimoires' => '../items/data/grimoires.php',
        'potions' => '../items/data/potions.php', 
        'shields' => '../items/data/shields.php', 
        'weapons' => '../items/data/weapons.php',
        'armors' => '../items/data/armors.php',
    ];

    foreach ($itemTypes as $category => $filePath) {
        // Include the file
        require_once $filePath;

        // Construct the function name dynamically
        $functionName = "get" . ucfirst($category) . "Items";
        
        // Check if function exists
        if (!function_exists($functionName)) {
            throw new Exception("Function $functionName does not exist.");
        }

        $items = $functionName();

        // Debug: Output the count of fetched items
        echo "Processing $category: " . count($items) . " items found.\n";

        foreach ($items as $item) {
            // Prepare the insertion query
            $query = "INSERT INTO items (name, description, price, image_url, category) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            
            // Bind parameters and execute
            $stmt->bind_param("ssdss", $item['name'], $item['description'], $item['price'], $item['image_url'], $category);
            if (!$stmt->execute()) {
                // Log detailed error
                echo "Failed to insert item: " . $stmt->error . "\n";
            }
            
            $stmt->close();
        }

        echo ucfirst($category) . " items processed successfully.\n";
    }

    // Commit the transaction
    $mysqli->commit();
    echo "Database update completed successfully.\n";
} catch (Exception $e) {
    // Rollback on error
    $mysqli->rollback();
    echo "Error: " . $e->getMessage();
}

// Close connection
$mysqli->close();

