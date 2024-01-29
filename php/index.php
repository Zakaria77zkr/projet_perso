<?php

include("includex/header.php");
include("includex/connexion.php");
include("includex/inscription.php");
// var_dump($_SESSION);
?>
    <main class="accueil_main">
    <section class="bloc_slider">   
        <div class="slider">
            <img src="./assets/ressources/accueil/accueil_boutiques.jpg" alt="im1" id="change">
            <div id="precedent" onclick="changeSlide(-1)">&#x2B9C;</div>
            <div id="suivant" onclick="changeSlide(1)">&#11166;</div>
        </div>
    </section> 

        <section class="accueil_section2">
            <!-- carousel presentation  -->
            <ul>
                <li><img src="assets/ressources/caroussel_accueil/1.webp" alt=""></li>
                <li><img src="assets/ressources/caroussel_accueil/2.webp" alt=""></li>
                <li><img src="assets/ressources/caroussel_accueil/3.webp" alt=""></li>
                <li><img src="assets/ressources/caroussel_accueil/4.webp" alt=""></li>
            </ul>
        </section>
        <section class="accueil_section3">
            <!-- Nos boutiques -->
            <img src="./assets/ressources/accueil/bureauvierge.jpg" alt="">
            <div class="boutiques">
                <h2>NOS BOUTIQUES</h2>
                <p>De vrais lieux de vie dans lesquels on aime vous rencontrer, vous écouter et vous conseiller. Et même mieux : nous vous consacrons toute notre attention lors d’un rendez-vous personnalisé.Une heure rien qu’à vous dans la boutique de votre choix.</p>
                <button><a href="./boutiques.php">NOS BOUTIQUES</a></button>
            </div>
        </section>
    </main>
    <?php
include("includex/footer.php");
?>

