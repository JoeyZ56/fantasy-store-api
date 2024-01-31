<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();

    // Connect to the database
    $mysqli = require_once("../database/database.php");

    // Use prepared statement to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();

    $result = $stmt->get_result();

    // Fetch the user record
    $user = $result->fetch_assoc();

    // Check if the user exists and the password is correct
    if ($user && password_verify($_POST["password"], $user["password_hash"])) {
        session_regenerate_id(true);

        $_SESSION["user_id"] = $user["id"];

        // Redirect to a dashboard or home page
        header("Location: http://localhost:5173/");
        exit;
    } else {
        $is_invalid = true;
    }

    $stmt->close();
}
?>
