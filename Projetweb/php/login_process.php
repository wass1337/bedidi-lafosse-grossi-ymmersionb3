<?php
session_start();
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
    $password = $_POST['password'];
    $query = "SELECT customer_id, password FROM customers WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();

    if(password_verify($password, $hashed_password)) {
        $_SESSION['customer_id'] = $user_id;
        header("Location: ../index.php");
        exit();
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
    $stmt->close();
}
$conn->close();
?>
