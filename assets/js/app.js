window.$ = window.jQuery = jQuery;

import 'slick-carousel';
import '@fancyapps/fancybox';

(function( $ ) {

const mq = {
    "sm": 576,
    "md": 768,
    "lg": 992,
    "xl": 1200
};


$(document).on('click', '.js-nav-toggle', function (e) {
    e.preventDefault();
    console.log('12');
    $(this).toggleClass('is-active');
    $('html').toggleClass('lock');
});

var replaceMenu = function () {
    if ($(window).width() < mq.lg) {
        $('.js-panel-inner').append($('.js-nav-bar-menu'));
    } else {
        $('.js-nav-bar-right').append($('.js-nav-bar-menu'));
        $('.panel').removeClass('panel-active');
        $('.nav-toggle').removeClass('is-active');
        $('html').removeClass('lock');
    }
}

replaceMenu();
$(window).on('resize', function () {
    replaceMenu();
});


$('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove(); }); 


        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
        
             //>=, not <=
            if (scroll > 165) {
                //clearHeader, not clearheader - caps H
                $(".nav-bar").addClass("nav-bar--fixed");
            }else{
                $(".nav-bar").removeClass("nav-bar--fixed");
            }
        }); //missing );

$('.js-project-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    rows: 0,
    arrows: false,
    dots: false,
    variableWidth: true,
    responsive: [
        {
            breakpoint: mq.lg,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: mq.md,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
    ]
});

})(jQuery);