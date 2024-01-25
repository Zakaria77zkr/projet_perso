<?php
// activation   la gestion d'erreur
// affichage des types erreurs
 error_reporting(E_ALL);
//  configuration de l'affichage de erreurs
 ini_set('display_errors', '1');
//  desactivation des enregistrements des erreurs
 ini_set('log_errors', '0');
//   configuration du dossier dans lequel les fichiers journaux d'erreurs seront stockés 
 ini_set('log_errors', './');

//  constantes de conexion à la  BDD
switch($_SERVER['HTTP_HOST']){
    // SI LE DOMMAIN EST LOCALHOST

    case'localhost':
        define('HOST','localhost');
        define('PORT','3306');
        define('DATA','formulaires');
        define('USER','root');
        define('PASS','');
    break;

        // DEUXIEME SOLUTION
    case'baobab-svr5':
        define('HOST','baobab-svr5');
        define('DATA','baobab-sql5');
        define('USER','baobab-user1');
        define('PASS','123456789m');    
        break;


    // dans le cas contraire
    default:
    

}








//  constant

?>