(function ($) {
	"use strict";
/*--document ready functions--*/
    jQuery(document).ready(function($){
        /*wow js init*/
		new WOW().init();
        /*bottom to top*/
        $(document).on('click','.back-to-top',function(){
           $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });
        /*--slick Nav Responsive Navbar activation--*/
          var SlicMenu = $('#main-menu');
         SlicMenu.slicknav();

        /*--------- testimonial carousel activation ---------*/
        var testimonialCarousel = $('.testimonial-carousel');
            testimonialCarousel.owlCarousel({
            loop:true,
            dots:true,
            nav:true,
            navText: ['<i class="icofont icofont-rounded-left"></i>','<i class="icofont icofont-rounded-right"></i>'],
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive : {
              0 : {
                  items: 1
              },
              768 : {
                  items: 1
              },
              960 : {
                  items: 1
              },
              1200 : {
                  items: 1
              },
              1920 : {
                  items: 1
              }
            }
        }); 
          var windowHeight = $(window).height();
          

    $('.content-for-template').css('min-height',parseInt(windowHeight)-172);

        /*scroll spy activate*/
        $("#main-menu").scrollspy({
             offset: -100 
            });
        /* smoth scroll*/
        $('#main-menu li a').on('click', function (e) {
            e.preventDefault();
            var anchor = $(this).attr('href');
            var top = $(anchor).offset().top;
            $('html, body').animate({
                scrollTop: $(anchor).offset().top
            }, 1000);
        });

        /*--------- Clients carousel activation ---------*/
        var clientsLogoCarousel = $('.logo-carousel');
        clientsLogoCarousel.owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            margin:10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                },
                1920: {
                    items: 4
                }
            }
        });
});

/*--window Scroll functions--*/
    $(window).on('scroll', function () {
      /*--show and hide scroll to top --*/
         var ScrollTop = $('.back-to-top');
            if ($(window).scrollTop() > 1000) {
                    ScrollTop.fadeIn(1000);
            } else {
                    ScrollTop.fadeOut(1000);
           }
       /*--sticky menu activation--*/
            var mainMenuTop = $('.navbar-area');
            if ($(window).scrollTop() > 300) {
                mainMenuTop.addClass('nav-fixed');
            } else {
                mainMenuTop.removeClass('nav-fixed');
            }
        /*--sticky Mobile menu activation--*/
            var mobileMenuTop = $('.slicknav_menu');
            if ($(window).scrollTop() > 300) {
                mobileMenuTop.addClass('nav-fixed');
            } else {
                mobileMenuTop.removeClass('nav-fixed');
            }
    });
           
/*--window load functions--*/
    $(window).on('load',function(){
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
    });

}(jQuery));	