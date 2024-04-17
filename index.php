<?php

include("includex/header.php");
include("includex/connexion.php");
include("includex/inscription.php");
// var_dump($_SESSION);
?>
    <?php 
    //  Affichage des messages de succès 
    // echo var_dump(($_SESSION['user']));
?>
    <main class="accueil_main">
    <section class="bloc_slider">
    <div class="slider-container">
        <div class="slider">
            <img src="./assets/ressources/accueil/accueil_boutiques.jpg" alt="im1" id="change">
            <div id="precedent" onclick="changeSlide(-1)">&#x2B9C;</div>
            <div id="suivant" onclick="changeSlide(1)">&#11166;</div>
        </div>
        <div id="sliderButtons">
            <button id="button1" onclick="goToSlide(0, 'boutiques.php')">Boutiques</button>
            <button id="button2" onclick="goToSlide(1, 'concept.php')">Concept</button>
            <button id="button3" onclick="goToSlide(2, 'eshop.php')">E-shop</button>
        </div> <!-- Container pour les boutons -->
    </div>
</section>

<section class="accueil_section3">
            <!-- Nos boutiques -->
            <img src="./assets/ressources/accueil/bureauvierge.jpg" alt="">
            <div class="boutiques">
                <h2>NOS BOUTIQUES</h2>
                <p>Nous créons des espaces accueillants où vous pouvez bénéficier d'une attention personnalisée lors de rendez-vous dans nos boutiques. Nous sommes là pour vous écouter, vous conseiller et vous offrir une expérience unique. Profitez d'une heure dédiée rien qu'à vous dans l'établissement de votre choix.</p>
                <button><a href="./boutiques.php">NOS BOUTIQUES</a></button>
            </div>
        </section>

<section class="accueil_section accueil_caroussel w-75 mx-auto mt-4 position-relative">
    <div class="accueil_carousel-container ">
      <div class="accueil_carousel-btn-container">
         <button class="accueil_carousel-btn" id="prevBtn">&#x27E8;</button>
         <button class="accueil_carousel-btn" id="nextBtn">&#12297;</button>
      </div>

      <div class="accueil_carousel-track" id="carouselTrack">
        <div class="accueil_carousel-slide ">
          <img src="assets/ressources/caroussel_accueil/1.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide">
          <img src="assets/ressources/caroussel_accueil/1.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide nomargin">
          <img src="assets/ressources/caroussel_accueil/1.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide ">
          <img src="assets/ressources/caroussel_accueil/2.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide">
          <img src="assets/ressources/caroussel_accueil/3.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide nomargin">
          <img src="assets/ressources/caroussel_accueil/4.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide">
          <img src="assets/ressources/caroussel_accueil/1.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide">
          <img src="assets/ressources/caroussel_accueil/1.webp" alt="Image 1">
        </div>
        <div class="accueil_carousel-slide">
          <img src="assets/ressources/caroussel_accueil/1.webp" alt="Image 1">
        </div>
      </div>
        
    </div>

    
 
 </section>

        
    </main>
    <script src="assets/js/fonction.js"></script>
    <?php
include("includex/footer.php");
?>

