<?php
// Activation de la gestion d'erreur

error_reporting(E_ALL);

// Configuration de l'affichage des erreurs
ini_set("display_errors", "1");

// désactivation des enregistrements des erreurs

ini_set("log_errors", "0");

// Configuration du dossier dans lequel les fichiers journaux d'erreur seront stockés
ini_set("log_errors", "./");

// Constantes de connexion à l abase de données

switch($_SERVER["HTTP_HOST"]) {
// Si le domaine est localhost
    case "localhost" :
        define("HOST", "localhost");  
        define("PORT", "3306");  
        define("DATA", "projet_perso");  
        define("USER", "root");  
        define("PASS", "");
        break;
    
// Deuxième solution
    case "baobab-svr5": 
        define("HOST", "baobab-svr5");  
        define("PORT", "");  
        define("DATA", "baobab-sql5");  
        define("USER", "baobab-user1");  
        define("PASS", "1234567M");
        break; 
}

?>