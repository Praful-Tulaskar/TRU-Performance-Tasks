let slideIndex = 1;

showSlides(slideIndex);


// Previous/Next Controls

function plusSlides(n){
    showSlides(slideIndex += n);
}


// Image Controls

function currentSlide(n){
    showSlides(slideIndex = n);
}

function showSlides(n){
    let slide = document.getElementsByClassName("slides");
    let dots = document.getElementsByClassName("dot");
    if (n > slide.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slide.length}
    for(let i = 0; i < slide.length; i++){
        slide[i].style.display = "none";
    }
    for(let i = 0; i < dots.length; i++){
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slide[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}