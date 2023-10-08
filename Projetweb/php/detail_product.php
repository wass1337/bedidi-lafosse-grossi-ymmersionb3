<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "projetweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product_id is set in URL
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);  // Ensure it is an integer
    
    // Query to fetch product details
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($product = $result->fetch_assoc()) {
        // Display product details
        echo "<h1>" . htmlspecialchars($product['name']) . "</h1>";
        echo "<p>" . htmlspecialchars($product['description']) . "</p>";
        echo "<p>Price: $" . htmlspecialchars($product['price']) . "</p>";
        echo "<p>Size: " . htmlspecialchars($product['size']) . "</p>";
        echo "<p>Color: " . htmlspecialchars($product['color']) . "</p>";
    } else {
        echo "Product not found!";
    }
}
?>
