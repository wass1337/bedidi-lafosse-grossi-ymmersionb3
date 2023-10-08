<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Panier</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

    <div class="hero_area">
  
      <!-- DEBUT HEADER -->
  
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
              <span>
               Ynov
              </span>
            </a>
  
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="watches.php"> Montres </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> À propos </a>
                </li>
                  <a class="nav-link" href="contact.html"> CONTACTEZ-NOUS </a>
                </li>
              </ul>
              <div class="user_option-box">
                <a href="signup.html">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <a href="cart.php">
                  <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- FIN HEADER -->

      <!-- DEBUT PAIEMENT -->
      <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                  <a href="watches.php">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Retour à la boutique</span></div>
                  </a>

                    <!-- PRODUITS  DANS LE PANIER -->

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


$query = "
SELECT c.cart_id, p.product_id, p.name, p.price, p.size, p.description, p.image
FROM cart c 
JOIN products p ON c.product_id = p.product_id 
WHERE c.customer_id = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nom: " . $row['name'] . "<br>";
        echo "Prix: " . $row['price'] . "<br>";
        echo "Taille: " . $row['size'] . "<br>";
        echo "Description: " . $row['description'] . "<br>";
        echo "<img src='data:image/png;base64," . base64_encode($row['image']) . "' alt='" . $row['name'] . "' width='100'><br>";

        // Formulaire pour supprimer un article du panier
        echo "<form action='./php/remove_from_cart.php' method='post'>";
        echo "<input type='hidden' name='cart_id' value='" . $row['cart_id'] . "'>";
        echo "<input type='submit' value='Retirer du panier'>";
        echo "</form>";

        echo "<hr>";
    }
} else {
    echo "Votre panier est vide.";
}

$stmt->close();
$conn->close();
?>


                      <!-- PRODUITS PROVISOIR DANS LE PANIER -->

                        <script>// Récupérez les produits depuis le stockage local
                          const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                          
                          // Affichez les produits dans le panier
                          const cartList = document.getElementById('cart-items');
                          cartItems.forEach(item => {
                            const cartItem = document.createElement('li');
                            cartItem.textContent = item.name;
                            cartList.appendChild(cartItem);
                          });
                          </script>
                      
                