<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Ajouter Produits</title>


  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <link href="css/style.css" rel="stylesheet" />
  <link href="css/admin.css" rel="stylesheet" />
  
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
                <a class="nav-link" href="index.php">Acceuil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="watches.php"> Montres </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> À propos </a>
              </li>
                <a class="nav-link" href="contact.html"> CONTACTEZ-NOUS <span class="sr-only">(current)</span> </a>
              </li>
            </ul>
            <div class="user_option-box">
              <a href="signup.html">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="cart.html">
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
  </div>


  <div class="heading_container heading_center">
    <h2>
      Administration - Ajouter produit
    </h2>

    <button id="add-product-btn">+</button>
        <div id="add-product-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Ajouter un Article</h2>
                <form id="product-form" action="./php/add_product.php" method="post" enctype="multipart/form-data">

                    <label for="name">Nom du Produit</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="color">Couleur</label>
                    <input type="text" id="color" name="color">
                    
                    <label for="size">Taille</label>
                    <input type="text" id="size" name="size">

                    <label for="price">Prix</label>
                    <input type="text" id="price" name="price">

                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    
                    <form action="./php/add_product.php" method="post">
                      <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                      <input type="submit" value="Ajouter produit">
                    </form>
            </div>
        </div>
    </main>

    <div id="product-list">
        <!-- LISTE DES PRODUITS AJOUTES -->
    </div>

    
</body>
</html>














    
    <script src="js/scripts.js"></script>
  </div>