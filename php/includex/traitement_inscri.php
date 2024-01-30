<?php

session_start();
include("../inc/constant2.php");

// vérification des jetons avant envoi

$nom = isset($_POST['nom']) ? $_POST['nom'] :""; 
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] :""; 
$mail = isset($_POST['mail']) ? $_POST['mail'] :""; 
$password = isset($_POST['password']) ? $_POST['password'] :"";
$errors = [];

// Validation du pseudo


if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u", $nom) === 0) {
    $errors["nom"] = "Le nom n'est pas valide";
}
if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u", $prenom) === 0) {
    $errors["prenom"] = "Le prénom n'est pas valide";
}
// Validation du mail

if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
    // Ajout d'un message d'erreur
    $errors["mail"] = "L'email n'est pas valide";
}
// Validation du mot de passe

if(preg_match("/^[A-Za-z0-9_$]{8,}/", $password) === 0) {
    $errors["password"] = "Le mot de passe n'est pas valide";
}

// Mise en place des protections XSS (évite les injections de code malveillant)

$nom = htmlspecialchars($nom);
$prenom = htmlspecialchars($prenom);
$mail = htmlspecialchars($mail);
$password = htmlspecialchars($password);

// Mise en place d'une condition de validation du formulaire

if(count($errors) > 0) { // Si il y a au moins une erreur

    // creation d'un tableau multidimensionnel compte-données (dans la session) avec les index nom, prenom, mail, password ; et les erreurs du tableau errors en valeurs

    $_SESSION["compte-données"]["nom"] = $nom; 
    $_SESSION["compte-données"]["prenom"] = $prenom;  // Alors crée un tableau "compte-données" et insére la valeur fausse.
    $_SESSION["compte-données"]["mail"] = $mail; 
    $_SESSION["compte-données"]["password"] = $password;

    // creation d'un tableau simple compte-errors qui comporte a chaque index(0,1,2,3,4...) toutes les erreurs d'un utilisateur
    $_SESSION["compte-errors"] = $errors;
    foreach ($errors as $error) {
        echo"<h2>$error</h2>";
    };
    
    exit();
}

// Parcourir le tableau Pseudo, mail, mot de passe

foreach($_POST as $key => $val) { // on récupère toutes les données du formulaire, on associe un index aux valeurs du tableau

    // if(isset($_POST[$key]) && !empty($_POST[$key])){

    // }else{
    //     htmlspecialchars($_POST[$key]) : null;
    // }
    //le ternaire est égale au if else
    // les index sont prenom, nom, mail, password    et les values sont :prenom, :nom, :mail, :password 
    $params[":" . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null; // on vérifie que toutes les variables ont été remplies et ne sont pas nulles, si la condition n'est pas vérifiée, on affecte la valeur "NULL"
}

// Cryptage du mot de passe

// $params[":password"] = sha1(md5($params[":password"]) . md5( $params[":password"]));
$params[":password"] = password_hash($params[":password"], PASSWORD_DEFAULT);

// connexion à la base de données
// include("inc/constant2.php");

try{

    // connexion à ma base de données
    // $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $cnn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
    // les options
    //la fleche : -> est pour assigner a ma variable $cnn sans changer sa valeur (si on utilise le =)
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //  teste si l'email n'existe pas déja
    // creation de la variable $sql qui contient la requete
    $sql = 'SELECT COUNT(*) as nb FROM users WHERE mail=?';
    // utilisation de prepare et execute pour la securité
    $qry = $cnn->prepare($sql);
    $qry->execute(array($params[':mail']));
    // utilisation de fetch pour récupérer un element et en faire un tableau
    $row = $qry->fetch();
    

    if($row['nb'] ==1){
        echo"<h2> cet email existe deja !!!";
        echo "<a href='../index.php'>Retour à la page d'accueil</a>";

    }else{
        $sql='INSERT INTO users(nom, prenom, mail, password)VALUES( :nom, :prenom, :mail, :password)';
        $qry=$cnn->prepare($sql);
        $qry->execute($params);
        // unset permet de couper les acces au PDO ($cnn)
        unset($cnn);

        // echo"<h2> Vous etes bien inscrit DWWM-2";
        // echo"<a href='../index.php'>retour à la page d'accueil</a>";
        header("location: ../index.php");
    }

}catch(PDOException $err){

    // gestion des erreurs
    // getMessage() afficher les erreurs de PDOException (qui est en paramètre)
    $err->getMessage();
    $_SESSION["compte-errors-sql"] = $err->getMessage();

    $_SESSION["compte-données"]["nom"] = $nom; 
    $_SESSION["compte-données"]["prenom"] = $prenom;  // Alors crée un tableau "compte-données" et insére la valeur fausse.
    $_SESSION["compte-données"]["mail"] = $mail; 
    $_SESSION["compte-données"]["password"] = $password;
    header("location: ../index.php");
    
exit;
}

?>