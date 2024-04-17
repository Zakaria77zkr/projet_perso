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





//1er SLIDER

const sliderData = [
    { image: "./assets/ressources/accueil/accueil_boutiques.jpg", link: "boutiques.php" },
    { image: "./assets/ressources/accueil/accueil_concept.webp", link: "concept.php" },
    { image: "./assets/ressources/accueil/accueil_eshop.webp", link: "eshop.php" }
];


let currentSlide = 0;

async function changeSlide(sens) {
    currentSlide += sens;
    if (currentSlide < 0) {
        currentSlide = sliderData.length - 1;
    } else if (currentSlide > sliderData.length - 1) {
        currentSlide = 0;
    }
    document.getElementById("change").src = sliderData[currentSlide].image;
    updateButtonVisibility();
}

function updateButtonVisibility() {
    const buttons = document.querySelectorAll("#sliderButtons button");
    buttons.forEach((button, index) => {
        if (index === currentSlide) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    });
}

function goToSlide(index, link) {
    currentSlide = index;
    document.getElementById("change").src = sliderData[currentSlide].image;
    window.location.href = link;
    updateButtonVisibility();
}

// Afficher initialement seulement le bouton de la slide 1
updateButtonVisibility();

// 2eme Caroussel
document.addEventListener("DOMContentLoaded", function() {
    const track = document.getElementById('carouselTrack');
    const slides = document.querySelectorAll('.accueil_carousel-slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
  
    let currentIndex = 0;
  
    function showSlide(index) {
      const newPosition = -index * 100 + '%';
      track.style.transform = 'translateX(' + newPosition + ')';
    }
  
    function nextSlide() {
      currentIndex = (currentIndex + 1) % (slides.length / 3);
      showSlide(currentIndex);
    }
  
    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length / 3) % (slides.length / 3);
      showSlide(currentIndex);
    }
  
    if(prevBtn){
      prevBtn.addEventListener('click', prevSlide);
      nextBtn.addEventListener('click', nextSlide);
      showSlide(currentIndex);
    }
  
  });
  

//menu burger

const header = document.querySelector(".header");
const burger = document.querySelector("#burger");  
const links = document.querySelectorAll("nav li");

burger.addEventListener("click", function() {
  header.classList.toggle("active");
});

links.forEach(function(link) {
  link.addEventListener("click", function() {
    header.classList.remove("active");
  });
});