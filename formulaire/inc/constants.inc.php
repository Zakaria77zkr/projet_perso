<?php
// // axctivation des messages d'erreurs
// error_reporting(E_ALL);
// ini_set('display_errors','1');
// ini_set('log_errors', '0');//enregistrement dans un fichier s'il est a 1
// ini_set('error_log','./'); //creer un repertoir

// // connexion BDD
// switch ($_SERVER['HTTP_HOST']) {
//     case 'localhost':
//        define('HOST','localhost');
//        define('PORT',3306);
//        define('DATA','hotels');
//        define('USER','root');
//        define('PASS','');
//         break;
//     case 'baobab-svr5': // Fictif
//         define('HOST', 'baobab-svr5');
//         define('DATA', 'baobab-sql5');
//         define('USER', 'baobab-usr1');
//         define('PASS', 'aR5*hgt+7uIopp$');
//         break;
//     default:
//         # code...
//         break;
// }

//pour se connecter

$db_host = "localhost";
$db_name = "formulaires";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

// Afficher les erreurs PDO
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
