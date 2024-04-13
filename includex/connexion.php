<?php
     // Afficher l'erreur
    if(isset($errorsSQL)){
        echo "<div>$errorsSQL</div>";
        return false;
        session_destroy();
    }
    ?>
    <div class="connexion_container hidden">
            <section class="connexion_section ">
                <button class="close_co">&times;</button>
                <div class="connexion_div ">
                    <h1 class="connexion_titre">Se Connecter</h1>
                    <form action="includex/traitement_co.php" method="post" class="connexion_form">
                        <input type="email" name="mail" placeholder="Email*">
                        <input type="password" name="password" placeholder="Mot de passe*">
                        <input type="submit" value="CONNEXION" class="connexion_submit" >
                    </form>

                    <div class="connexion_aide">
                        <a href="forgot.php">Mot de passe oublié</a>
                        <a class="inscription_lien">Pas de compte ? S'inscrire</a>
                    </div>        
                </div>
            </section>
            <div class="overlay_co"></div>
    </div>

        