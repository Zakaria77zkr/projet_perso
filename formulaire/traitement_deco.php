<!-- nettoyage des données passées en post -->
<?php
$mail =(isset($_POST['mail']) && !empty($_POST['logout'])) ? htmlspecialchars($_POST['mail']) : null;
$password =(isset($_POST['mail']) && !empty($_POST['password'])) ? htmlspecialchars($_POST['password']) : null;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])){
    //destruction de la session
    session_start();
    session_destroy();

    echo "vous etes bien deconnecter";
    exit;
}
    if($mail && $password){

    }else{
        echo"La déconnexion à échoué";
    }
?>

