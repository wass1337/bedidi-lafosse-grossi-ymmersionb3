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
  <script src="js/fonction.js"></script>
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Nos Montres</title>


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

    <!-- header section strats -->
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
                <a class="nav-link" href="index.php"> Accueil </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="watches.php"> Montres <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> À propos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html"> Contactez-nous </a>
              </li>
            </ul>
            <div class="user_option-box">
              <a href="">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="cart.php">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </a>
              
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- shop section -->


    <h3>Filtres</h3>


    <select name="filtre" id="filtre" onchange="update(this)">
        <optgroup label="Filtre">
            <option value="choix">Choisir</option>
            <option value="croissant">Prix croissant</option>
            <option value="decroissant">Prix décroissant</option>
        </optgroup>
    </select>


    <button onclick="fonction_filtre()">submit</button>


  <section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <!-- You may insert heading here if needed -->
    </div>
    <div class="row">
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

        $cookie= $_COOKIE['cookie'];
        
    
    
        //filtre croissant
        if($cookie == "croissant") {

        $conn->set_charset("utf8mb4");
        $query =  "SELECT * FROM products ORDER BY price ASC";
        $result = $conn->query($query);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              
      ?>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['name']; ?>">
              </div>
              <div class="detail-box">
                <h6>
                  <?php echo $row['name']; ?>
                </h6>
                <h6>
                  Price:
                  <span>
                    <?php echo $row['price']; ?>€
                  </span>
                </h6>
              </div>
            </a>
            <form action="./php/add_to_cart.php" method="post">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
              <input type="submit" value="Ajouter au panier">
            </form>
          </div>
        </div>
      <?php
            }
        } else {
            echo "0 résultats trouvés.";
        }
        $conn->close();
      
      ?>
    </div>
  </div>
</section>

<?php
} else if($cookie == "decroissant") {

  $conn->set_charset("utf8mb4");
        $query = "SELECT * FROM products ORDER BY price DESC";
        $result = $conn->query($query);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              
      ?>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['name']; ?>">
              </div>
              <div class="detail-box">
                <h6>
                  <?php echo $row['name']; ?>
                </h6>
                <h6>
                  Price:
                  <span>
                    <?php echo $row['price']; ?>€
                  </span>
                </h6>
              </div>
              
            </a>
            <form action="./php/add_to_cart.php" method="post">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
              <input type="submit" value="Ajouter au panier">
            </form>
          </div>
        </div>
      <?php
            }
        } else {
            echo "0 résultats trouvés.";
        }
        $conn->close();
      
      ?>
    </div>
  </div>
</section>


<?php
      }

?>


  <!-- end shop section -->

  <!-- DEBUT FOOTER -->

  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              A Propos
            </h4>
            <p>
            Chez nous 
              on fusionne technologie et 
              style pour vous accompagner à chaque 
              instant de votre journée. Nos produits ne sont pas seulement 
              des accessoires de mode, mais de véritables 
              compagnons de vie. Nous aspirons à enrichir votre quotidien 
              avec des gadgets qui allient fonctionnalité et élégance.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  2 Rue Le Corbusier, 13090 Aix-En-Provence
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  1337 420 69 666
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  support@ynov.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://extranet.ynov.com">Ynov Students</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- FIN SECTION -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>