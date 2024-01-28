// RECHERCHER

let rechercher = document.querySelector(".rechercher");
let loupe =  document.querySelector(".loupe");
loupe.addEventListener("click" , function(){
    if(rechercher.classList.contains("hidden")){
    rechercher.classList.remove("hidden");
    }else{
        rechercher.classList.add("hidden");
    }
})

//  INSCRIPTION/CONNEXION
let inscricontainer = document.querySelector(".inscription_container");
let cocontainer = document.querySelector(".connexion_container");
let cobutton = document.querySelector(".connexion_button");
let inscrilien = document.querySelector(".inscription_lien");
let colien = document.querySelector(".connexion_lien");
let closeco = document.querySelector(".close_co");
let closeinscri =document.querySelector(".close_inscri");
let overlayco = document.querySelector(".overlay_co");
let overlayinscri =document.querySelector(".overlay_inscri");


cobutton.addEventListener("click" , function(){
    cocontainer.classList.remove("hidden");
})


closeco.addEventListener("click" , function(){
    cocontainer.classList.add("hidden");
})
overlayco.addEventListener("click" , function(){
    cocontainer.classList.add("hidden");
})
document.addEventListener("keydown" , function(e){
    if(e.key==="Escape" && !cocontainer.classList.contains("hidden")){
        cocontainer.classList.add("hidden");}
    
})




closeinscri.addEventListener("click" , function(){
    inscricontainer.classList.add("hidden");
})
overlayinscri.addEventListener("click" , function(){
    inscricontainer.classList.add("hidden");
})
document.addEventListener("keydown" , function(e){
    if(e.key==="Escape" && !inscricontainer.classList.contains("hidden")){
        inscricontainer.classList.add("hidden");}
})

inscrilien.addEventListener("click" , function(){
    inscricontainer.classList.remove("hidden");
    cocontainer.classList.add("hidden");
})
colien.addEventListener("click" , function(){
    cocontainer.classList.remove("hidden");
    inscricontainer.classList.add("hidden");
})



// SLIDER PRINCIPAL (1) ACCUEIL

const slider = ["./assets/ressources/accueil/accueil_boutiques.jpg", "./assets/ressources/accueil/accueil_concept.webp","./assets/ressources/accueil/accueil_eshop.webp"];
let num = 0;
async function changeSlide(sens){
    num=num + sens;
    if(num < 0) {
        num = slider.length -1;
    } else
     if (num > slider.length -1) {
        num = 0;
     }

document.getElementById("change").src=slider[num]

}
                             


//menu burger

const header = document.querySelector(".header");
const burger = document.querySelector("#burger");  // Assurez-vous de remplacer "nom_de_votre_icone" par le sélecteur réel de votre élément déclencheur
const links = document.querySelectorAll("nav li");

burger.addEventListener("click", function() {
  header.classList.toggle("active");
});

links.forEach(function(link) {
  link.addEventListener("click", function() {
    header.classList.remove("active");
  });
});