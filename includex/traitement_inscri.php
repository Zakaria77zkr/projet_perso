<?php
// Inclusion des fichiers nécessaires
include_once "../inc/constant.php";
include_once "fonction.php";

session_start();


// Vérification si les champs requis sont remplis
if (
    isset($_POST["genre"]) && ($_POST["genre"] == "0" || $_POST["genre"] == "1")
    && !empty($_POST["nom"])
    && !empty($_POST["prenom"])
    // && !empty($_POST["date"])
    && isset($_POST["mail"])
    && isset($_POST["password"])
) {
    $genre = htmlspecialchars($_POST["genre"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $date = htmlspecialchars($_POST["date"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["password"]);

    // Vérification de la complexité du mot de passe
    if (verif_pass($password)) {
        $password_hash = password_hash($password, PASSWORD_ARGON2I); // Hashage du mot de passe
        $mail = htmlspecialchars($_POST["mail"]);

        // Préparer la requête SQL
        $sql = "SELECT COUNT(*) AS count FROM users WHERE mail = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mail]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'adresse e-mail existe déjà
        if ($row['count'] > 0) {
            echo "<h2>Adresse e-mail déjà utilisée.<br></h2>";
            echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
        } else {
            // Vérification de l'adresse email
            if (!verif_mail($mail)) {
                echo "<h2>Adresse e-mail non valide.<br></h2>";
                echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
            } else {
                try {
                    // Préparation et exécution de la requête SQL pour insérer les données dans la base de données
                    $sql2 = "INSERT INTO users (genre, nom, prenom, mail, password) VALUES (?, ?, ?, ?, ?)";
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->execute([$genre, $nom, $prenom, $mail, $password_hash]);

                    if ($stmt2->rowCount() > 0) {
                        echo "<h2>Compte créé avec succès.<br></h2>";
                        echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
                    } else {
                        echo "<h2>Problème lors de la création du compte. Veuillez contacter l'administrateur.<br></h2>";
                        echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
                    }
                } catch (Exception $error) {
                    echo "<h2>Erreur de base de données : " . $error->getMessage() . "</h2>";
                    echo '<h2><a href="../index.php">Retour à l\'accueil</a></h2>';
                }
                
            }
        }
    } else {
        // Si le mot de passe ne satisfait pas les critères de complexité
        echo "<h2>Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule, un chiffre et au moins un caractère spécial.<br></h2>";
        echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
    }
} else {
    // Si tous les champs requis ne sont pas remplis
    echo '<h2>Veuillez remplir correctement les champs<br></h2>';
    echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
    
}




