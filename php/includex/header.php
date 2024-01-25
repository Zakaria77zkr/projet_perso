<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<?php session_start();?>
<body>

    <header class="header">
        <a href="index.php"><img src="assets/ressources/header/logo1.png" alt="" class="header_logo" ></a>
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
             <li class="connexion_button"><i class="fa-solid fa-user fa-xl" ></i></li>
             <li><a href="#"><i class="fa-solid fa-basket-shopping fa-xl"></i></a></li>
             <li><button><a href="index.php"><i class="fa-solid fa-power-off"></i></a></button></li>
            </ul>
             <!-- <img src="ressources/header/loupe.svg" alt="">
             <img src="ressources/header/panier.png" alt="">
             <img src="ressources/header/profile.svg" alt=""> -->
         
    </header>

