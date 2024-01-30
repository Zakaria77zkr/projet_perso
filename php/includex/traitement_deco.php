<?php
//// <!-- nettoyer des données passées en post -->
session_start();

if(isset($_SESSION)){

    // destruction de la session
    
    echo "Abe, session en cours de déconnexion";
    session_destroy();
    header("location:../index.php");
} else {
    echo " Vous n'êtes pas connecté";
    header("location:index.php");
}
