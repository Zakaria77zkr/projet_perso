<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<?php
    session_start() ;
?>
<body>
    <header class="header">
        <a href="index.php" class="header_logo"><img src="./assets/ressources/header/logo1.png" alt="Logo de mon site"></a>
        <nav class="header_navi">
            <ul class="header_menu">
                <li class="header_li_menu"><a href="index.php">Accueil</a></li>
                <li class="header_li_menu"><a href="eshop.php">E-shop</a></li>
                <li class="header_li_menu"><a href="concept.php">Concept</a></li>
                <li class="header_li_menu"><a href="boutiques.php">Boutiques</a></li>
            </ul>
        </nav>
        <ul class="header_icones">
            <li class="bloc_recherche"><input type="text"  class="rechercher hidden" placeholder="Rechercher..."><i class="fa-solid fa-magnifying-glass fa-xl loupe"></i></li>
            <li><a href="panier.php"><i class="fa-solid fa-basket-shopping fa-xl"></i></a></li>
            <li class="connexion_button" id="<?php if (isset($_SESSION['user'])) { echo 'hidden1';} ?>"><i class="fa-solid fa-user fa-xl" ></i></li>
            <li id="<?php if (!isset($_SESSION['user'])) { echo 'hidden1';} ?>">
            <a href="./profile.php"><i class="fa-solid fa-rocket fa-xl"></i></a>
            </li>
        </ul>
        <div id="burger"></div>
    </header>