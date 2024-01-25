let rechercher = document.querySelector(".rechercher");
let loupe =  document.querySelector(".loupe");
loupe.addEventListener("click" , function(){
    if(rechercher.classList.contains("hidden")){
    rechercher.classList.remove("hidden");
    }else{
        rechercher.classList.add("hidden");
    }
})


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

