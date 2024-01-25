<?php
// nettoiyage des données passées en post
$mail =(isset($_POST['mail']) && !empty($_POST['mail'])) ? htmlspecialchars($_POST['mail']) : null;
$password =(isset($_POST['password']) && !empty($_POST['password'])) ? htmlspecialchars($_POST['password']) : null;

// si le mot de passe ou email sont explitable **

if($mail && $password){
// connexion à ma base de données
$password = sha1(md5($password) . md5($password));
try{
 include_once('inc/constant2.php');
 $cnn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
//gestion    des attributs de la connexion
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //  preparation des requetes
    $qry = $cnn->prepare('SELECT * FROM users WHERE mail=? AND password=? AND  active=?
    ');
    $qry->execute(array($mail, $password, 1));

    // si une ligne est trouvée
    if($qry->rowCount() === 1){

        header('location:user_home.php');
    }else{
        echo "user inconnu";
    }



}catch(PDOException $err){
    echo $err->getMessage();

}

}else{
    echo 'mail ou mot de passe invalides';
}



// <!-- La fonction password_verify est une fonction intégrée du langage de programmation PHP 
// qui est utilisée spécifiquement pour vérifier si un mot de passe haché correspond à un mot de passe en texte brut. Cette fonction est 
// généralement utilisée en conjonction avec la fonction password_hash, qui est utilisée pour hacher les mots de passe de manière sécurisée -->


// nettoyage des données passées en post
// $mail = (isset($_POST['mail']) && !empty($_POST['mail'])) ? htmlspecialchars($_POST['mail']) : null;
// $password = (isset($_POST['password']) && !empty($_POST['password'])) ? $_POST['password'] : null;

// // si le mot de passe ou email sont exploitables
// if ($mail && $password) {
 

//     // connexion à ma base de données
//     try {
//         include_once('inc/constant2.php');
//         $cnn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);

//         // gestion des attributs de la connexion
//         $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//         // preparation des requetes
//         $qry = $cnn->prepare('SELECT * FROM users WHERE mail=? AND active=?');
//         $qry->execute(array($mail, 1));

//         // récupérer l'utilisateur
//         $dataUser = $qry->fetch();

//         // vérifier le mot de passe avec password_verify
//         if ($dataUser && password_verify($password,  $dataUser['password'])) {
//             header('location:deconnexion.php');
//         } else {
//             echo "Utilisateur inconnu ou mot de passe incorrect";
//         }
//     } catch (PDOException $err) {
//         echo $err->getMessage();
//     }
// } else {
//     echo 'Mail ou mot de passe invalides';
// }
?>