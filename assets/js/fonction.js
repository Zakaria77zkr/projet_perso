let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirm-password");
let connectError = document.querySelector(".connectError");

function verifpass() {

    if (password.value !== confirmPassword.value) {
        connectError.textContent = "Vos mots de passe ne sont pas identiques !";
        return false;  
    }       
};

