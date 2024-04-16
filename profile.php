<?php
include("includex/header.php");

if (!isset($_SESSION['user'])) {
    // Rediriger vers la page d'accueil si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$prenom = $_SESSION['user']['prenom'];
$nom = $_SESSION['user']['nom'];
$mail = $_SESSION['user']['mail'];
$genre = $_SESSION['user']['genre'];
?>

<div class="profile_container"><?php echo var_dump($genre);?>
    <section class="profile_section">
    
        <div class="profile_div">
            <div class="bandeau">
                <!-- <img src="./assets/ressources/profile/profile.jpg" alt=""> -->
            </div>
            <div class="profile_center">
                <form action="includex/update_profile.php" method="post">
                    <div class="profile_top">
                        <label for="">Votre Nom: </label>
                        <input type="text" placeholder="<?php echo $nom; ?>" name="nom">
                        <label for="">Votre Prénom: </label>
                        <input type="text" placeholder="<?php echo $prenom; ?>" name="prenom">
                        
                        <p><?php 
                        if($genre == 0){
                            echo "CLIENT ELEGANT";
                        }else{
                            echo "CLIENTE ELEGANTE";
                            }?></p>
                    </div>
                    <div class="profile_left">
                    <label for="">Votre Mail: </label>
                        <input type="email" placeholder="<?php echo $mail; ?>" name="mail">
                    </div>
                    <div class="profile_right">
                        <input type="date" placeholder="12/03/2002" class="hidden">
                    </div>
                    <div class="profile_bottom">
                        <input type="submit" value="Mettre à jour">
                    </div>
                </form>
            </div>
            <div class="deconnexion_button">
                <button><a href="includex/traitement_deco.php"><i class="fa-solid fa-power-off-xl">Deconnexion</i></a></button>
            </div>
        </div>

    </section>
</div>
