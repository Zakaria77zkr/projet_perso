
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Inscription</title>
    <style >
    *{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end;
        }
        header ul li {
            margin-left: 10px;
            display: inline-block;
            cursor: pointer;
        }
        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            margin-top: 0;
        }
        form label {
            display: block;
            margin-top: 10px;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #555;
        }

    </style>
</head>
<body>
    <header>
        <ul>
            <li>inscription</li>
            <li>connexion</li>
        </ul>
    </header>
    <main>
    <section>
       
    <form  action="traitement_ins.php" method="post">
                 <div class="sign-up-htm">
                   <div class="group">
                     <label for="pseudo" class="label">Pseudo</label>
                     <input type="text" id="pseudo" name="pseudo" $pattern = '/[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}/u';
 class="input  <?php if(isset($pseudoMsgErreur) && !empty($pseudoMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="pseudoFeedback" >
                     <?php if(isset($pseudoMsgErreur)){                  ?>
                     <div class="invalid-feedback" id="pseudoFeedback">
                     <?php echo  $pseudoMsgErreur; ?> 
                   </div> <?php } ?>
   
                   </div>
                   <div class="group">
                     <label for="email" class="label">Email</label>
                     <input type="email"  id="email" name="mail" class="input <?php if(isset($emailMsgErreur) && !empty($emailMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="emailFeedback"  >
                     <?php if(isset($emailMsgErreur)){      ?>
                     <div class="invalid-feedback" id="emailFeedback"> 
                       <?php echo  $emailMsgErreur; ?>
                     </div>
                     <?php } ?>
                   </div>
                   <div class="group">
                     <label for="pass1" class="label">Mot de Passe</label>
                     <input type="password" id="pass1" name="password"  class="input <?php if(isset($passMsgErreur) && !empty($passMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="passFeedback" >
                     <?php if(isset($passMsgErreur)){                  ?>
                     <div class="invalid-feedback" id="passFeedback">
                       <?php echo  $passMsgErreur; ?>
                     </div>
                     <?php } ?>
                   </div>
                   <div class="group">
                     <label for="pass2" class="label">Confirmer le mot de passe</label>
                     <input type="password" class="input" id="pass2" pattern="[A-Za-z0-9_$]{8,}">
                   </div>
                   
                   <div class="group">
                     <input type="submit" class="button" value="Inscription"  id="register">
                   </div>
                 </form>
                   <div class="hr"></div>
                   <div class="foot-lnk">
                     <label for="tab-1">Déja Membre?</a>
                   </div>
                 </div>
               </div>
         </section>
       </main>
       </body>
   </html>

