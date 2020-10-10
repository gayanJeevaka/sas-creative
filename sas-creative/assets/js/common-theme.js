/**
 * @package WordPress
 * @subpackage sas-creative
 * @version 1.0.0
 */
$ = jQuery.noConflict();

$("#body").css('min-height', window.innerHeight - ($("#footer").height() + $("#header").height()));


const btnScroll = $('#btnScroll');
btnScroll.hide();
const divNavMenuStatic = $('#divNavMenuStatic');
const navbarStatic = $('#navbarStatic');

/* window scroll event*/
$(window).scroll(() => {
    let sticky = document.getElementById('header').offsetHeight + 20;
    let windowScrollYHeight = window.scrollY;

    if (window.pageYOffset > sticky) {
        divNavMenuStatic.css({
            position: 'fixed',
            zIndex: 500,
            top: 0,

        });

        let classNameFixed = navbarStatic.prop('class');
        // check static nab-bars is clicked
        if (classNameFixed.match("show")) {
            divNavMenuStatic.find("button[data-target]").trigger('click');
        }


    } else {
        divNavMenuStatic.css({
            position: 'static',
            zIndex: 0

        });

    }
// check height to show scroll button
    if (windowScrollYHeight > 400) {
        btnScroll.show();
    } else {
        btnScroll.hide();
    }
});
/* btn scroll top event handler ============================================*/
$("#btnScroll").click(() => {
    window.scroll({
        top: 0,
        behavior: 'smooth'
    });
});

/* when click somewhere menu will be minimized ================================================= */
$(document).click(function () {
    let classNameStatic = navbarStatic.prop('class');
    if (classNameStatic.match("show")) {
        divNavMenuStatic.find('button[data-target]').trigger('click');
    }
});

$(function () {
    const formContactUs = $("#formContactUs");

    /*Contact us form validation ======================================= */
    formContactUs.submit(function (event) {
        event.preventDefault();
        formContactUs.find('.form-control').each(function (index, controller) {
            if ($(controller).val() === "") {
                $(controller).addClass('error-input');
            } else {
                $(controller).removeClass('error-input');

            }
        });
    });
});


