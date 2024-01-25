<?php
session_start();
// Nettoyage des données passées en post
$mail = (isset($_POST["mail"]) && !empty($_POST["mail"])) ? htmlspecialchars($_POST["mail"]) : null;
$password = (isset($_POST["password"]) && !empty($_POST["password"])) ? $_POST["password"] : null;

// Est-ce que le mot de passe ou email sont exploitables
if ($mail && $password) {
    // $password = sha1(md5($password) . md5($password));
    try {
        include_once("../../inc/constant2.php");
        $cnn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Préparation de la requête
        $qry = $cnn->prepare("SELECT * FROM users WHERE mail=?");
        $qry->execute(array($mail));
        $user = $qry->fetch();

        // Si une ligne est trouvée
        if ($qry->rowCount() === 1) {
           
            // Vérification du mot de passe
            if (password_verify($password, $user['password'])) {
                echo 'Le mot de passe est valide !';
                $_SESSION['user'] = $user;
                
                header("location:../index.php");
            } else {
                echo "Mot de passe incorrect."; 
            }
        } else {
            echo "Utilisateur inconnu";
            session_destroy();
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
} else {
    echo "Mail ou mot de passe invalide";
    session_destroy();
}
?>
