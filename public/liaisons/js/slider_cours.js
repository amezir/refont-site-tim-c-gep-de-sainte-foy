var slideIndexCours = 1;
showSlidesCours(slideIndexCours);

function currentSlideCours(n) {
    showSlidesCours(slideIndexCours = n);
}

function showSlidesCours(n) {
    var j;
    var slides = document.getElementsByClassName("mySlides-cours");
    var dots = document.getElementsByClassName("dot-cours");
    if (n > slides.length) { slideIndexCours = 1 }
    if (n < 1) { slideIndexCours = slides.length }
    for (j = 0; j < slides.length; j++) {
        slides[j].style.display = "none";
    }
    for (j = 0; j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" active4", "");
    }
    slides[slideIndexCours - 1].style.display = "block";
    dots[slideIndexCours - 1].className += " active4";
}
