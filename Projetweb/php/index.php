
<html>

    <head>
        
        <title>Formulaire</title>
        <meta charset="utf-8">
        <link href="CSS_JS/style.css" rel="stylesheet"/>
        <script src="fonction.js"></script>

        
    </head>

    <body>

    <h3>Filtres</h3>


    <select name="filtre" id="filtre" onchange="update(this)">
        <optgroup label="Filtre">
            <option value="choix">Choisir</option>
            <option value="croissant">Prix croissant</option>
            <option value="decroissant">Prix décroissant</option>
        </optgroup>
    </select>


    <button onclick="fonction_filtre()">submit</button>

    <?php
    $cookie= $_COOKIE['cookie'];
    


    //filtre croissant
    if($cookie == "croissant") {

        $dsn = "mysql:host=localhost;dbname=essais";
        $dbusername = "root";
        $dbpass = "root";
        
        
        
        $connexion = mysqli_connect("localhost", $dbusername, $dbpass, "projetweb");
        $somevar = $_GET["uid"]; 
        
        
        if (!$connexion) {
            die("Échec de la connexion à la base de données : " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM products ORDER BY price ASC";
        $resultat = $connexion->query($sql);
        
        if (!$resultat) {
            die("Erreur dans la requête : " . $connexion->error);
        }
        
        

        while($row = $resultat->fetch_assoc()) {
            echo "<li>" . $row["name"] . "</li>";
            echo "<li>" . $row["description"] . "</li>";
            echo "<li>" . $row["price"] . "</li>";
        }


        
        $resultat->free_result(); // Libère le résultat
        $connexion->close();
    }
    //fin du filtre croissant

    //filtre décroissant

    else if($cookie == "decroissant") {
        
        $dsn = "mysql:host=localhost;dbname=essais";
        $dbusername = "root";
        $dbpass = "root";
        
        
        
        $connexion = mysqli_connect("localhost", $dbusername, $dbpass, "projetweb");
        $somevar = $_GET["uid"]; 
        
        
        if (!$connexion) {
            die("Échec de la connexion à la base de données : " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM products ORDER BY price DESC";
        $resultat = $connexion->query($sql);
        
        if (!$resultat) {
            die("Erreur dans la requête : " . $connexion->error);
        }
        
        

        while($row = $resultat->fetch_assoc()) {
            echo "<li>" . $row["name"] . "</li>";
            echo "<li>" . $row["description"] . "</li>";
            echo "<li>" . $row["price"] . "</li>";
        }


        
        $resultat->free_result(); // Libère le résultat
        $connexion->close();


    }


    //fin du filtre décroissant
    ?>


    <div id="demo"></div>






    

    
        
    

    </body>





</html>
