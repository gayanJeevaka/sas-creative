/**
 * @package WordPress
 * @subpackage sas-creative
 * @version 1.0.0
 */
$ = jQuery.noConflict();

/* service slider settings ========================================================= */
$(function () {
        let swiper = new Swiper('.swiper-container', {

          //  slidesPerView: 1,
            slidesPerView: 'auto',
            spaceBetween: 10,

            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });

    $('.carousel').carousel({
        interval: 5000,
        keyboard: true,
        pause: false
    });



});


