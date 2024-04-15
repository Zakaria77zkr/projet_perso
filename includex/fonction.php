
<?php
function verif_pass($mdp) {
    $regex = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*\s).{8,}$^";
    return preg_match($regex , $mdp);    
}

function verif_mail($email) {
    $regex_mail = "/^(?=.{1,254}$)[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+)*@(?!-)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(?<!-)(?:\.[a-zA-Z]{2,})$/";
    return preg_match($regex_mail , $email);    
}

