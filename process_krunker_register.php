<?php
// Replace these credentials with your actual database information
$servername = "127.0.0.1";
$username = "flex";
$password = "juicewrld99!!5566";
$dbname = "krunlbdv_main";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize input (prevent SQL injection)
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password (for secure storage)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Perform a SQL query to insert the new user into the database
$query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

if ($conn->query($query) === TRUE) {
    echo "User registered successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
