<?php


require_once("./inc/constants.inc.php");

// Vérification des jetons de CSRF à envoyer
$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
$email = isset($_POST['mail']) ? $_POST['mail'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';

session_start();

// Initialisation du tableau d'erreurs
$erreurs = [];

// Validation du pseudo
if (preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u", $pseudo) === 0) {
    // Ajout d'un message d'erreur
    $erreurs["pseudo"] = "Le pseudo n'est pas valide";
}

// Vérification de l'email
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    // Ajout d'un message d'erreur
    $erreurs["mail"] = "L'email n'est pas valide";
}

// Validation du mot de passe
if (preg_match("/^[A-Za-z0-9_]{8,}$/", $pass) === 0) {
    // Ajout d'un message d'erreur
    $erreurs["password"] = "Le mot de passe n'est pas valide";
}

// Mise en place d'une protection XSS
$pseudo = htmlspecialchars($pseudo);
$email = htmlspecialchars($email);
$pass = htmlspecialchars($pass);

// Si des erreurs sont présentes, rediriger vers la page de formulaire
if (count($erreurs) > 0) {
    $_SESSION["compte-donnees"]["pseudo"] = $pseudo;
    $_SESSION["compte-donnees"]["mail"] = $mail;
    $_SESSION["compte-donnees"]["password"] = $pass;
    $_SESSION["compte-erreurs"] = $erreurs;
    echo '<h2 class="reponse_mailexiste">Vous n\'avez pas rempli tous les champs';
    echo '<a href="compte.php">Retour à l\'accueil</a>';
    exit;
}

// Parcourir le tableau POST
foreach ($_POST as $key => $val) {
    $params[':' . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}

// Cryptage de l'email et du mot de passe
// $params[':mail'] = md5(md5($params[":mail"]) . strlen($params[':mail']));
$params[':password'] = sha1(md5($params[":password"]) . md5($params[':password']));

include("./inc/constants.inc.php");

// Connexion avec la base de données
try {
    // Connexion à la BDD
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

    // Options
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Teste si l'email n'existe pas déjà
    $sql = 'SELECT COUNT(*) AS nb FROM users WHERE mail=?'; // Paramètre anonyme
    $qry = $cnn->prepare($sql); // Prépare la requête
    $qry->execute(array($params[':mail']));
    $row = $qry->fetch();

    if ($row['nb'] == 1) {
        echo '<h2 class="reponse_mailexiste">Cette adresse mail existe déjà !';
        echo '<a href="compte.php">Retour à l\'accueil</a>';
        // header("location:compte.php");
    } else {
        $sql = 'INSERT INTO users(pseudo, mail, password) VALUES(:pseudo, :mail, :password)';
        $qry = $cnn->prepare($sql);
        $qry->execute($params);
        unset($cnn); // Déconnexion

        echo '<h2 class="reponse_mailexiste">Vous êtes bien inscrit ';
        echo '<a href="compte.php">Retour à la page de connexion</a>';
        // header('location:textes.php');
    }
} catch (PDOException $err) {
    // Gestion des erreurs PDO
    $_SESSION["compte-erreur-sql"] = $err->getMessage();
    $_SESSION["compte-donnees"]["pseudo"] = $pseudo;
    $_SESSION["compte-donnees"]["mail"] = $email;
    $_SESSION["compte-donnees"]["password"] = $pass;
    header("location: compte.php"); // Redirection avec le code HTTP 302
    exit;
}
?>