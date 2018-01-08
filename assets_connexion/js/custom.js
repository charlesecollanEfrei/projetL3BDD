/*=========================================================================
        Preloader
=========================================================================*/
$(window).load(function() {
    "use strict";
    $(".preloader").delay(350).fadeOut('slow');
});

$(function(){
    "use strict";
    /*=========================================================================
            One Page Nav
    =========================================================================*/
    $('.navbar-default').singlePageNav({
        offset: $('.navbar-default').outerHeight(),
        filter: ':not(.external)',
        updateHash: false,
        speed: 1000,
        easing: 'easeInOutCubic'
    });

    /*=========================================================================
            Slick Slider
    =========================================================================*/
    $('.showcase-slide').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3,
        variableWidth: true,
        dots: true,
        arrows: false,
        responsive: [
          {
            breakpoint: 991,
            settings: {
              arrows: false,
              slidesToShow: 1,
              variableWidth: false
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              slidesToShow: 1,
              variableWidth: false
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              slidesToShow: 1,
              variableWidth: false
            }
          }
        ]
      });
    $( ".slick-dots" ).appendTo( "#showcase-dots" );
    $('.testimonial-slide').slick({
        dots: true,
        arrows: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false
            }
          }
        ]
      });

    /*=========================================================================
            Magnific Popup Functions
    =========================================================================*/
    $('.hero-video-wrap').magnificPopup({
      type: 'iframe',
      iframe: {
          markup: '<div class="mfp-iframe-scaler">'+
                    '<div class="mfp-close"></div>'+
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                  '</div>', 

          patterns: {
            youtube: {
              index: 'youtube.com/',

              id: 'v=',

              src: 'http://www.youtube.com/embed/%id%?autoplay=1'
            },
            vimeo: {
              index: 'vimeo.com/',
              id: '/',
              src: '//player.vimeo.com/video/%id%?autoplay=1'
            },
            gmaps: {
              index: '//maps.google.',
              src: '%id%&output=embed'
            }

          },

          srcAction: 'iframe_src',
        }
    });

});

/*=========================================================================
        Sticky Header Animation
=========================================================================*/
var animatedHeader = (function() {
  "use strict";

  var docElem = document.documentElement,
    header = document.querySelector( ".navbar-default" ),
    didScroll = false,
    changeHeaderOn = 100;

  function init() {
    window.addEventListener( 'scroll', function( event ) {
      if( !didScroll ) {
        didScroll = true;
        setTimeout( scrollPage, 250 );
      }
    }, false );
  }

  function scrollPage() {
    var sy = scrollY();
    if ( sy >= changeHeaderOn ) {
      classie.add( header, 'shrink' );
    }
    else {
      classie.remove( header, 'shrink' );
    }
    didScroll = false;
  }

  function scrollY() {
    return window.pageYOffset || docElem.scrollTop;
  }

  init();

})();