// tiny slider code
if (typeof(document.querySelector(".ng_slider__slide")) != 'undefined' && document.querySelector(".ng_slider__slide") != null) {
    var slide_index = 1;
    displaySlides(slide_index);
    function nextSlide(n) {
      displaySlides((slide_index += n));
    }
    function currentSlide(n) {
      displaySlides((slide_index = n));
    }

    function displaySlides(n) {
      var slides = document.getElementsByClassName("ng_slider__slide");
      if (n > slides.length) {
        slide_index = 1;
      }
      if (n < 1) {
        slide_index = slides.length;
      }
      Array.prototype.forEach.call(slides, function(slide, index) {
        slide.style.display = "none";
      });
      slides[slide_index - 1].style.display = "flex";
    }
}