<?php
// inclure la page de connexion
session_start();
include_once "inc/constant.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
</head>
<body>
    <!-- afficher les produits du panier -->
    <a href="panier.php">Panier<span><?= isset($_SESSION['panier']) ? array_sum($_SESSION['panier']) : 0 ?></span></a>

    <section>
        <?php
        // inclure la page de coonexion de la base de données 
        include_once("inc/constant.php");

        try{
            // creation une connexion PDO
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

            // préparation de la requette SQL sécurisée pour selectionner les produits
            $sql = "SELECT * FROM products";
            $query = $pdo->prepare($sql);
            $query->execute();
            $products = $query->fetchALL(PDO ::FETCH_ASSOC);
            foreach($products as $product){
            ?>
                <article>
                    <img src="img/<?=htmlspecialchars($product['img']) ?>" alt="<?=htmlspecialchars($product['name']) ?>">
                    <h4><?=htmlspecialchars($product['name']) ?></h4>
                    <h4><?=number_format($product['price'] , 2) ?>€</h4>
                    <a href="ajout.php?id=<?=htmlspecialchars($product['id']) ?>">Ajouter</a>
                    <!-- ? c'est la method get -->
                </article>
            <?php
            } 
        }catch(PDOException $err){
            echo"Erreur :".err->getMessage();

        }

        // Fermeture de la base de données
        $pdo = null;

        ?>
     
    </section>
</body>
</html>