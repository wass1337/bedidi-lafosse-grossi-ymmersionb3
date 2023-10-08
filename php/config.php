<?php
$servername = "localhost";  // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "projetweb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set character set to utf8mb4
$conn->set_charset("utf8mb4");
?>
