<?php
include_once "fonction.php";
?>
<div class="inscription_container hidden">
    <div class="inscription_div">
        <section class="inscription_section">
            <button class="close_inscri">&times;</button>

            <h1 class="inscription_titre">Créer un compte</h1>

            <!-- Formulaire -->
            <form action="includex\traitement_inscri.php" method="post" class="inscription_form" onsubmit="return verif_pass()">
                <div class="inscription_radio">
                    <input type="radio" id="M." name="genre" value="0"><label for="monsieur">M.</label>
                    <input type="radio" id="Mme" name="genre" value="1"><label for="madame">Mme.</label>
                </div>
                <div class="nomprenom">
                    <input type="text" name="nom" placeholder="Nom*" pattern="[/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u]">
                    <input type="text" name="prenom" placeholder="Prénom*" pattern="[/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u]">
                </div>
                <div class="date hidden">
                    <input type="date" id="date" name="date">
                </div>

                <div class="inscription_emailmdp">
                    <input type="email" name="mail" placeholder="Email*" pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/">
                    <input type="password" name="password" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*\s).{8,}">
                    <input type="password" placeholder="Confirmation du mot de passe*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*\s).{8,}">
                </div>
                <input type="submit" value="CRÉER MON COMPTE" class="inscription_submit">
            </form>

            <div class="inscription_aide">
                <a class="connexion_lien">Déja Membre ? Se connecter</a>
            </div>
        </section>
    </div>
    <div class="overlay_inscri"></div>
</div>
   