<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "root";
$basededonnees = "projetweb";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image = file_get_contents($_FILES['image']['tmp_name']);

    $stmt = $connexion->prepare("INSERT INTO Products (name, size, price, color, image) VALUES ('$name', '$size', '$price', '$color', '$image')");
if(!$stmt){
    die("Erreur de préparation : " . $connexion->error);
}

$stmt->bind_param("ssiib", $name, $color, $size, $price, $image);

if(!$stmt->execute()){
    die("Erreur d'exécution : " . $stmt->error);
}

echo "Name: $name, Color: $color, Size: $size, Price: $price";

    $stmt->close();
    $connexion->close();
}
?>
