let slides = document.getElementsByClassName("slide");
let currentSlide = 0;

function showSlide() {
  slides[currentSlide].classList.remove("active");
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add("active");
}

// Afficher la première diapositive
slides[currentSlide].classList.add("active");

// Changer de diapositive toutes les 3 secondes
setInterval(showSlide, 3000)