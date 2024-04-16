<?php
//// <!-- nettoyer des données passées en post -->
session_start();

if(isset($_SESSION)){
    // destruction de la session
    echo "<h2>Session en cours de déconnexion</h2>";
    session_destroy();
    header("location:../index.php");
} else {
    echo "<h2>Erreur lors de la déconnexion, vous n'êtes pas connecté</h2>";
    echo '<h2><a href="../index.php">Retour a l\'accueil</a></h2>';
}
