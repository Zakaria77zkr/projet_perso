<?php
include_once "../inc/constant.php"; // Inclusion du fichier contenant la connexion à la base de données

session_start(); // Démarrez la session sur la page

if (isset($_SESSION['user']) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["mail"])) {
    $id = $_SESSION['user']['id'];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $mail = $_POST["mail"];
    
    // Valider l'adresse e-mail
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse e-mail invalide";
        exit();
    }

    try {
        $sql = "UPDATE users SET prenom=?, nom=?, mail=? WHERE user_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$prenom, $nom, $mail, $id]);

        // Mettre à jour les données de session avec les nouvelles valeurs
        $_SESSION['user']['prenom'] = $prenom;
        $_SESSION['user']['nom'] = $nom;
        $_SESSION['user']['mail'] = $mail;

        echo "Compte mis à jour avec succès";
        header("location: ../profile.php");
    } catch (Exception $error) {
        echo "Une erreur s'est produite lors de la mise à jour du compte : " . $error->getMessage();
        echo '<h2><a href="../profile.php">Retour à la page de profile</a></h2>';
    }
} else {
    echo "<h2>Veuillez remplir correctement tous les champs</h2>";
    echo '<h2><a href="../profile.php">Retour à la page de profile</a></h2>';
}
?>
