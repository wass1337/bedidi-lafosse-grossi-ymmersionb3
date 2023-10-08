<?php
session_start();

// Ensure the user is logged in
if(!isset($_SESSION['customer_id'])) {
    die("Vous devez être connecté pour ajouter un produit au panier.");
}

// Ensure a product id is provided
if(!isset($_POST['product_id'])) {
    die("Aucun produit sélectionné.");
}

$servername = "localhost";
$username = "root";
$password = "root";
$database = "projetweb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

$product_id = $_POST['product_id'];
$customer_id = $_SESSION['customer_id'];

// Ensure the product exists
$query = "SELECT * FROM products WHERE product_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 0) {
    die("Produit non trouvé.");
}

// Add product to cart
$query = "INSERT INTO cart (customer_id, product_id) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $customer_id, $product_id);

if($stmt->execute()) {
    // Rediriger vers la page du panier
    header("Location: ../cart.php");
    exit();
} else {
    echo "Erreur lors de l'ajout du produit au panier : " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
