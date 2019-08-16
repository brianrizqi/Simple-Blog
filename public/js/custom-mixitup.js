(function($){
    
    "use strict";

var themesEl1 = document.querySelector('[data-ref="container-1"]');


var config = {
  controls: {
    scope: 'local'
  }
};

var mixer1 = mixitup(themesEl1, config);

jQuery( 'ul.post-category li:first-child' ).trigger( 'click' );

}(jQuery));