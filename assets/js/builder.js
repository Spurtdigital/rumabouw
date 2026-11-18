// Builder components
(function( $ ) {

    const mq = {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200
    };

    
// $(document).on('ready', function(){
    $('.js-builder-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        rows: 0,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: mq.xl,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
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
    }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var count = $('.js-home-hero-count');
        count.addClass('changing');
        setTimeout(function () {
            count.html(nextSlide + 1);
            count.removeClass('changing');
            $('.js-slider-line').attr('data-number', nextSlide + 1);
        }, 500);
    });

// builder toggle
$(document).on('click', '.js-faq-toggle', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    const parent = $(this).closest('.js-faq');
    if(parent.hasClass('is-active')) {
      parent.removeClass('is-active').find('.js-faq-content').stop().slideUp(300);
    } else {
      parent.addClass('is-active').find('.js-faq-content').stop().slideDown(300);
    }
});

})(jQuery);