<?php
session_start();
include_once "inc/constant.php";

// Supprimer les produits du panier
if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $id_del = intval($_GET['del']); // Convertir en entier pour éviter les injections

    // Vérifier si l'élément existe dans le panier avant de le supprimer
    if (isset($_SESSION['panier'][$id_del])) {
        unset($_SESSION['panier'][$id_del]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="panier">
    <a href="boutique.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Supprimer</th>
            </tr>
            <?php
            $total = 0;

            // Vérifier si le panier existe et s'il est un tableau
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                $ids = array_keys($_SESSION['panier']);

                // Vérifier si le panier est vide
                if (empty($ids)) {
                    echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
                } else {
                    // Convertir les IDs en entiers pour éviter les injections
                    $productIds = implode(',', array_map('intval', $ids));

                    try {
                        // Créer une connexion PDO
                        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);


                        // Préparer la requête préparée pour récupérer les produits du panier depuis la base de données
                        $query = "SELECT id, name, price, img FROM products WHERE id IN ($productIds)";
                        $stmt = $pdo->prepare($query);

                        // Exécuter la requête préparée
                        $stmt->execute();

                        // Récupérer les résultats
                        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Parcourir les produits du panier
                        foreach ($products as $product):
                            // Calculer le sous-total (prix unitaire * quantité) pour chaque produit
                            $subtotal = $product['price'] * $_SESSION['panier'][$product['id']];
                            $total += $subtotal;
                            ?>
                            <tr>
                                <td><img src="img/<?=htmlspecialchars($product['img'])?>" alt="<?=htmlspecialchars($product['name'])?>"></td>
                                <td><?=htmlspecialchars($product['name'])?></td>
                                <td><?=$product['price']?>€</td>
                                <td><?=htmlspecialchars($_SESSION['panier'][$product['id']])?></td>
                                <td><a href="panier.php?del=<?=urlencode($product['id'])?>"><img src="img/poubelle.png" alt="Supprimer"></a></td>
                            </tr>
                        <?php endforeach;

                        // Fermer la connexion PDO
                        $pdo = null;
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                }
            }
            ?>
            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>
        </table>
       
    </section>
    <button class="link">Payer</button>
</body>
</html>
