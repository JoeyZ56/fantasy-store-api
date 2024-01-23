<!-- http://localhost/fantasy-store-api/api/login-logout-signup/process-signup.php -->
<?php
// CORs
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// Validate Name
if (empty($_POST["name"])) {
    die("Name is required");
}

// Validate Email
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// Validate Password
// For testing password length is 3
if (strlen($_POST["password"]) < 3) {
    die("Password must be at least 3 characters long");
}

// Password must contain one letter
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

// Password must contain one number
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

// Validate Confirm Password
if ($_POST["password"] != $_POST["password_confirmation"]) {
    die("Password does not match");
}

// MANDATORY!!!! Hash the password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Connect to the database
require_once("../database/database.php");

// Check if email already exists
$checkEmailSql = "SELECT * FROM user WHERE email = ?";
$checkEmailStmt = $mysqli->prepare($checkEmailSql);
$checkEmailStmt->bind_param("s", $_POST["email"]);
$checkEmailStmt->execute();
$result = $checkEmailStmt->get_result();

// Check if the email already exists
if ($result->num_rows > 0) {
    die("Email already exists");
}

// Close the statement
$checkEmailStmt->close();

// Insert new user
$insertUserSql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$insertUserStmt = $mysqli->prepare($insertUserSql);
$insertUserStmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

// Execute the statement
if ($insertUserStmt->execute()) {
    header("Location: http://localhost:5173/login");
    exit;
} else {
    echo "Error: " . $insertUserSql . "<br>" . $mysqli->error;
}

// Close the statement
$insertUserStmt->close();
?>
