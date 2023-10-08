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

if(!isset($_SESSION['customer_id'])) {
    echo "Vous devez être connecté pour voir votre panier.";
    exit();
}

$user_id = $_SESSION['customer_id'];


// Vérifiez si cart_id est défini
if(!isset($_POST['cart_id'])) {
    die("ID de l'article non spécifié.");
}

$cart_id = $_POST['cart_id'];

// Préparez et exécutez la requête SQL pour supprimer l'article du panier
$sql = "DELETE FROM cart WHERE cart_id = ?";
$stmt = $conn->prepare($sql);

if($stmt === false) {
    die("Erreur lors de la préparation de la requête : " . $conn->error);
}

$stmt->bind_param("i", $cart_id);

if($stmt->execute()) {
    header("Location: ../cart.php?status=success");
} else {
    header("Location: ../cart.php?status=error");
}

$stmt->close();
$conn->close();
?>
