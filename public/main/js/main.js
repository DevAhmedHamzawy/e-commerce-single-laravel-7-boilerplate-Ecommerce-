$(document).ready(function() {


    // executes when HTML-Document is loaded and DOM is ready
   
   // breakpoint and up  
   $(window).resize(function(){
       if ($(window).width() >= 980){	
   
         // when you hover a toggle show its dropdown menu
         $(".navbar .dropdown-toggle").hover(function () {
            $(this).parent().toggleClass("show");
            $(this).parent().find(".dropdown-menu").toggleClass("show"); 
          });
   
           // hide the menu when the mouse leaves the dropdown
         $( ".navbar .dropdown-menu" ).mouseleave(function() {
           $(this).removeClass("show");  
         });
     
           // do something here
       }	
   });  
     
  
    // Adjust Slider Height
    var winH    = $(window).height(),
        //upperH  = $('.upper-bar').innerHeight(),
        //navH    = $('.navbar').innerHeight();
        //headerMainH = $('.header-main').innerHeight();
        headerH  = $('header').innerHeight() + 20;
    $('.slider, .carousel-item').height(winH - ( headerH ));
  
  

   
    $('.owl-carousel').owlCarousel({
      rtl:true,
      loop:true,
      margin:10,
      nav:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:4
          }
      }
  })
  
  $('.owl-carousel .owl-stage .active').last().css("border","none");
   var swiper = new Swiper('.swipermm', {
      slidesPerView: 2,
      spaceBetween: 30,
       navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper = new Swiper('.swiperxx', {
      slidesPerView: 4,
      spaceBetween: 2,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 2,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 2,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 2,
        },
      }
    });

    $(".takesrc").click(function(evt){
      // alert($(this).attr("src"));
      var test=$(this).attr("src");
      $(".putimage").attr("src",test);
      
  });
// document ready  
});
