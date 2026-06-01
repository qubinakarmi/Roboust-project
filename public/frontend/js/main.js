$(document).ready(function() {
    if($(window).width() <= 831) {
        $(".nav-link.dropdown-toggle").removeAttr("data-bs-hover");
        $(".nav-link.dropdown-toggle").attr("data-bs-toggle", "dropdown");
    }
});

$(window).scroll(function() {    
var scroll = $(window).scrollTop();

if (scroll >= 200) {
    $("header").addClass("fixed-top");
} else {
    $("header").removeClass("fixed-top");
}
});




//TESTIMONIAL

$(function() {
  // Owl Carousel
  var owl = $(".owl-one");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:2
          },

          1024:{
              items:2
          },

          1025:{
              items:3
          }
      }      
  });
});


//partner

$(function() {
  // Owl Carousel
  var owl = $(".owl-two");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
          0:{
              items:2
          },

          575:{
              items:2
          },
  
          600:{
              items:4
          },

          1024:{
              items:6
          },

          1025:{
              items:6
          }
      }      
  });
});

//STUDENT

$(function() {
  // Owl Carousel
  var owl = $(".owl-three");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:3000,
    slideSpeed: 1000,
    slideTransition: 'linear',
    autoplaySpeed: 3000,
    autoplayHoverPause: true,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:1
          },

          1024:{
              items:1
          },

          1025:{
              items:1
          }
      }      
  });
});


//BACK TO TOP
      $(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});

//COUNTER

      let count = document.querySelectorAll(".count")
let arr = Array.from(count)



arr.map(function(item){
  let startnumber = 0

  function counterup(){
  startnumber++
  item.innerHTML= startnumber
   
  if(startnumber == item.dataset.number){
      clearInterval(stop)
  }
}

let stop =setInterval(function(){
  counterup()
},50)

})

//PRICING

const cards = document.querySelectorAll(".pricing-card");
cards.forEach((item) => {
  item.addEventListener("mouseover", () => {
    cards.forEach((el) => el.classList.remove("active"));
    item.classList.add("active");
  });
});


//FAQS
$(document).ready(function(){
  $('.accordion-list > li > .answer').hide();
    
  $('.accordion-list > li').click(function() {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active").find(".answer").slideUp();
    } else {
      $(".accordion-list > li.active .answer").slideUp();
      $(".accordion-list > li.active").removeClass("active");
      $(this).addClass("active").find(".answer").slideDown();
    }
    return false;
  });
  
});

//LOGIN

document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    if (signUpButton && signInButton && container) {
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
            console.log("Sign Up button clicked - adding class");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
            console.log("Sign In button clicked - removing class");
        });
    } else {
        console.error("Could not find one or more elements: #signUp, #signIn, #container");
    }
});

