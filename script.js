AOS.init({
  offset: 200,
  duration: 1000,
  delay: 50,
});

var $w = $(window).scroll(function(){
  if (document.getElementsByClassName("home")[0]) {
    if ( $w.scrollTop() > $(".home").offset().top + 10) {   
        $('.navbar').addClass("active");
    } else {
        $('.navbar').removeClass("active");
    }
  } else if (document.getElementById("other-section")) {
    if ( $w.scrollTop() > $("#other-section").offset().top - 100) {   
        $('.navbar').addClass("active");
    } else {
        $('.navbar').removeClass("active");
    }
  }
});

if ($(window).scrollTop() > $(".home").offset().top + 10) {   
    $('.navbar').addClass("active");
} else {
    $('.navbar').removeClass("active");
}

function toggleNav() {
  var nav = document.getElementsByClassName("full-nav")[0];
  if (nav.style.visibility == "visible") {
    nav.setAttribute("style", "visibility:hidden;opacity:0;transform:translateY(-300px)");
  } else {
    nav.setAttribute("style", "visibility:visible;opacity:1;transform:translateY(0px)");
  }
}