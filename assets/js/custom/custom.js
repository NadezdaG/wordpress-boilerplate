// tiny slider code
if (typeof(document.querySelector(".ng_slider__slide")) != 'undefined' && document.querySelector(".ng_slider__slide") != null) {
    var slide_index = 0;
    var sliderRotate = setInterval(function(){slide_index = slide_index+1;displaySlides(slide_index)}, 5000);
    
    function nextSlide(n) {
      clearInterval(sliderRotate);
      slide_index = slide_index + n;
      displaySlides(slide_index);
      sliderRotate = setInterval(function(){slide_index = slide_index+1;displaySlides(slide_index)}, 5000)
    }

    function displaySlides(n) {
      var slides = document.getElementsByClassName("ng_slider__slide");
      if (n >= slides.length) {
        slide_index = 0;
      }
      if (n < 0) {
        slide_index = slides.length-1;
      }
      removeClass(document.querySelector(".ng_slider__slide.active"),"active");
      addClass(slides[slide_index],"active");
    }
}

// cross-browser functions to remove or add classes
function hasClass(element,classn) {
  return !!element.className.match(new RegExp('(\\s|^)'+classn+'(\\s|$)'));
}

function addClass(element,classn) {
  if (!hasClass(element,classn)) element.className += " "+classn;
}

function removeClass(element,classn) {
  if (hasClass(element,classn)) {
    var reg = new RegExp('(\\s|^)'+classn+'(\\s|$)');
    element.className=element.className.replace(reg,' ');
  }
}