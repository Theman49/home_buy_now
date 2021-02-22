function openModal(modal) {
    document.getElementById(modal).style.display = "block";
  }
  
  function closeModal(modal) {
    document.getElementById(modal).style.display = "none";
  }
  
  var slideIndex = 1;
  // showSlides(slideIndex);
  
  function plusSlides(n, modal) {
    showSlides(slideIndex += n, modal);
  }
  
  function currentSlide(n, modal) {
    showSlides(slideIndex = n, modal);
  }
  
  function showSlides(n, modal) {
    var i;
    var slides = document.getElementById(modal).getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }

  // tooltip
  function tooltip(id){
    document.getElementById('tooltip-text-' + id).classList.add("show-tooltip");
  }

  function tooltipLeave(id){
    document.getElementById('tooltip-text-' + id).classList.remove("show-tooltip");
  }