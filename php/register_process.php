<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "projetweb";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO customers (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);

    if($stmt->execute()) {
        echo "Account created successfully. <a href='../signup.html'>Login</a>";
    } else {
        echo "Error creating account: " . $stmt->error;
    }
}
$conn->close();
?>
