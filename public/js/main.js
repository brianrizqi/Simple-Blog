
(function($){

  "use strict";



// Mouse-enter dropdown
$('#navbar li').on("mouseenter", function() {
  $(this).find('ul').first().stop(true, true).delay(350).slideDown(500, 'easeInOutQuad');
});
// Mouse-leave dropdown
$('#navbar li').on("mouseleave", function() {
  $(this).find('ul').first().stop(true, true).delay(100).slideUp(150, 'easeInOutQuad');
});

/**
*  Arrow for Menu has sub-menu
*/
if ($(window).width() > 992) {
  $(".navbar-arrow ul ul > li").has("ul").children("a").append(" <i class='arrow-indicator fa fa-angle-right'></i>");
};

$(".searchtoggl a").attr("id","searchtoggl");$(function(){var $searchlink=$('#searchtoggl a');var $searchbar=$('#searchbar');$('#navbar li a').on('click',function(e){if($(this).attr('id')=='searchtoggl'){if(!$searchbar.is(":visible")){$searchlink.removeClass('fa-search').addClass('fa-search-minus');}else{$searchlink.removeClass('fa-search-minus').addClass('fa-search');}
  $searchbar.slideToggle(300,function(){});}});});

$(".searchtoggl a").attr("id","searchtoggl");$(function(){var $searchlink=$('#searchtoggl a');var $searchbar=$('#searchbar');$('.header-social-links-2 li a').on('click',function(e){if($(this).attr('id')=='searchtoggl'){if(!$searchbar.is(":visible")){$searchlink.removeClass('fa-search').addClass('fa-search-minus');}else{$searchlink.removeClass('fa-search-minus').addClass('fa-search');}
  $searchbar.slideToggle(300,function(){});}});});
/**
* Sticky Header
*/

$(window).scroll(function(){

  if( $(window).scrollTop() > 10 ){

    $('.navigation').addClass('navbar-sticky')

  } else {
    $('.navigation').removeClass('navbar-sticky')
  }
});

 
  
    

/*======= Main Slider Init =========*/

var interleaveOffset = 0.5;
var swiperOptions = {
  loop: true,
  speed: 1500,
  grabCursor: true,
  watchSlidesProgress: true,
  mousewheelControl: true,
  keyboardControl: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  autoplay: {
    delay: 3000,
  },
  fadeEffect: {
    crossFade: true
  },
  on: {
    progress: function() {
      var swiper = this;
      for (var i = 0; i < swiper.slides.length; i++) {
        var slideProgress = swiper.slides[i].progress;
        var innerOffset = swiper.width * interleaveOffset;
        var innerTranslate = slideProgress * innerOffset;
        swiper.slides[i].querySelector(".slide-inner").style.transform =
        "translate3d(" + innerTranslate + "px, 0, 0)";
      }
    },
    touchStart: function() {
      var swiper = this;
      for (var i = 0; i < swiper.slides.length; i++) {
        swiper.slides[i].style.transition = "";
      }
    },
    setTransition: function(speed) {
      var swiper = this;
      for (var i = 0; i < swiper.slides.length; i++) {
        swiper.slides[i].style.transition = speed + "ms";
        swiper.slides[i].querySelector(".slide-inner").style.transition =
        speed + "ms";
      }
    }
  }
};

var swiper = new Swiper(".swiper-container", swiperOptions);

$(document).on( 'click', '#back-to-top, .back-to-top',function(){
  $('html, body').animate({ scrollTop:0 }, '500');
  return false;
});
$(window).on( 'scroll', function(){

  /* ------------------------------------------------------------------------ */
/* BACK TO TOP 
/* ------------------------------------------------------------------------ */

if( $(window).scrollTop() > 500 ){
  $("#back-to-top").fadeIn(200);
} else{
  $("#back-to-top").fadeOut(200);
}

/* ------------------------------------------------------------------------ */
/* BACK TO TOP 
/* ------------------------------------------------------------------------ */

});


/**
* Slicknav - a Mobile Menu
*/
var $slicknav_label;
$('#responsive-menu').slicknav({
  duration: 500,
  easingOpen: 'easeInExpo',
  easingClose: 'easeOutExpo',
  closedSymbol: '<i class="fa fa-plus"></i>',
  openedSymbol: '<i class="fa fa-minus"></i>',
  prependTo: '#slicknav-mobile',
  allowParentLinks: true,
  label:"" 
});


$('.footer-slider-inner').slick({
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  autoplay: true,
  responsive: [
  {
    breakpoint: 1100,
    settings: {
      slidesToShow: 4
    }
  },
  {
    breakpoint: 800,
    settings: {
      slidesToShow: 3    
    }
  },
  {
    breakpoint: 500,
    settings: {
      slidesToShow: 2
    }
  }
  ]
});

$('.stock-slider').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  autoplay: true,
  responsive: [
  {
    breakpoint: 1100,
    settings: {
      slidesToShow: 3
    }
  },
  {
    breakpoint: 800,
    settings: {
      slidesToShow: 2    
    }
  },
  {
    breakpoint: 500,
    settings: {
      slidesToShow: 1
    }
  }
  ]
});

$('.score-slider-inner').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  autoplay: true,
  responsive: [
  {
    breakpoint: 1100,
    settings: {
      slidesToShow: 3
    }
  },
  {
    breakpoint: 800,
    settings: {
      slidesToShow: 2    
    }
  },
  {
    breakpoint: 500,
    settings: {
      slidesToShow: 1
    }
  }
  ]
});

$('.footer-slider-inner-2').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  autoplay: true,
  responsive: [
  {
    breakpoint: 1100,
    settings: {
      slidesToShow: 4
    }
  },
  {
    breakpoint: 800,
    settings: {
      slidesToShow: 3    
    }
  },
  {
    breakpoint: 500,
    settings: {
      slidesToShow: 2
    }
  }
  ]
});

$('.slider-store').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-thumbs'
});
$('.slider-thumbs').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-store',
  dots: false,
  centerMode: true,
  arrows: true,
  focusOnSelect: true
});


$('.slider-shop').slick({
  infinite: true,
  autoplay: true,
  arrows: true,
  dots: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
      {
      breakpoint: 639,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    }
  ]
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(document).on('click', 'a.page-scroll', function(event) {
  var $anchor = $(this);
  $('html, body').stop().animate({
    scrollTop: $($anchor.attr('href')).offset().top
  }, 1500, 'easeInOutExpo');
  event.preventDefault();
});


}(jQuery));


