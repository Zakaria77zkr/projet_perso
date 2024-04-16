<?php
// Inclusion des fichiers nécessaires
include_once "../inc/constant.php";
include_once "fonction.php";

// Vérification si les champs requis sont remplis
if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["password"]);

    try {
        // Préparer la requête SQL pour récupérer l'utilisateur par son email
        $sql = "SELECT * FROM users WHERE mail = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe
        if ($user) {
            // Vérifier si le mot de passe est correct
            if (password_verify($password, $user['password'])) {
                // Authentification réussie
                session_start();
                $_SESSION['user'] = array(
                    'prenom' => $user['prenom'],
                    'nom' => $user['nom'],
                    'mail' => $user['mail'],
                    'id' => $user['user_id'],
                    'genre' => $user['genre']
                    ); // Création du tableau associatif user et attribution à la session
                header("location:../index.php");
                // Redirection vers la page d'accueil
                echo '<h2><a href="../../index.php">Retour à la page d\'accueil</a></h2>';
            } else {
                // Mot de passe incorrect
                echo "<h2>Mot de passe incorrect.<br></h2>";
                echo '<h2><a href="../index.php">Retour à la page d\'accueil</a></h2>';
            }
        } else {
            // Utilisateur non trouvé
            echo "<h2>Utilisateur non trouvé.<br></h2>";
            echo '<h2><a href="../index.php">Retour à la page d\'accueil</a></h2>';
        }
    } catch (Exception $error) {
        // Erreur de base de données
        echo "<h2>Erreur de base de données : " . $error->getMessage() . "</h2>";
        echo '<h2><a href="../index.php">Retour à la page d\'accueil</a></h2>';
    }
} else {
    // Si tous les champs requis ne sont pas remplis
    echo '<h2>Veuillez remplir correctement les champs<br></h2>';
    echo '<h2><a href="../index.php">Retour à la page d\'accueil</a></h2>';
}
?>
