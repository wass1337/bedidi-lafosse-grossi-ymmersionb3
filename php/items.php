<?php
$servername = "localhost";
$dbname = "projetweb";
$dbuser = "root";
$dbpass = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("SELECT name, size, price, color FROM products");
    $stmt->execute();

    $results = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Taille</th>
                <th>Prix</th>
                <th>Couleur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($results as $product){
                echo "<tr>
                        <td>{$product['name']}</td>
                        <td>{$product['size']}</td>
                        <td>{$product['price']}</td>
                        <td>{$product['color']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
