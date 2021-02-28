jQuery(document).ready(function($) {
    // Skip to content smooth scroll JavaScript
    $(document).ready(function() {
        $('.skip-link').click(function(skip) {
            skip.preventDefault();
            $('html, body').animate({ scrollTop: $(this.hash).offset().top }, 500);
        });
    });

    // Add class in navigation bar
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('.navbar-fixed').addClass('fixed-top');
        } else {
            $('.navbar-fixed').removeClass('fixed-top');
        }
    });

    // Added class on dropdown menu span
    if ($(document).width() <= 1200) {
        $('.menu-item-has-children').append('<span class="caret"></span>');

        $('.caret').click(function() {
            $(this).parent().toggleClass('menu-open').siblings().removeClass('menu-open');
        });

        $(document).click(function(e) {
            if ($(e.target).is('.caret, .sub-menu, .sub-menu li, .sub-menu a') === false) {
                $('.menu-item-has-children').removeClass('menu-open');
            }
        });
    }

    // Menu show and hide in focus attributes
    $('.menu-item-has-children').children().focusin(function() {
        $(this).parent().addClass('focus');
    });

    $('.menu-item-has-children').children().focusout(function() {
        $(this).parent().removeClass('focus');
    });

    if ($(document).width() <= 991) {
        $('#navbarCollapse').prepend('<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="screen-reader-text">Menu</span><div class="navbar-toggler-icon"><span></span><span></span><span></span></div></button>');
        $('#navbarCollapse').addClass('responsive');
    }

    $('.navbar.appear-left .navbar-toggler').click(function() {
        $('body').toggleClass('page-overlay');
    });

    // To top Java Script
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height >= 200) {
            $('#up-btn').addClass('ayotothetop');
        } else {
            $('#up-btn').removeClass('ayotothetop');
        }
    });
    $('#up-btn').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });
    // Traping menu in smallscreen on focus
    function screenFunction(medScreen) {
        if (medScreen.matches) {

            const focusableElements =
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
            const modal = document.querySelector('#navbarCollapse');

            const firstFocusableElement = modal.querySelectorAll(focusableElements)[0];
            const focusableContent = modal.querySelectorAll(focusableElements);
            const lastFocusableElement = focusableContent[focusableContent.length - 1];


            document.addEventListener('keydown', function(e) {
                let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

                if (!isTabPressed) {

                }

                if (e.shiftKey) {
                    if (document.activeElement === firstFocusableElement) {
                        lastFocusableElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastFocusableElement) {
                        firstFocusableElement.focus();
                        e.preventDefault();
                    }
                }
            });

            firstFocusableElement.focus();
        } else {
            return;
        }
    }

    var medScreen = window.matchMedia("(max-width: 991px)");
    screenFunction(medScreen);
    medScreen.addListener(screenFunction);

    // Adding active class on click and removing from its siblings
    $('.section_faqs .accordion-button').click(function() {
        $(this).parent().toggleClass('active').siblings().removeClass('active');
    });

    // Adding class if navigation arrows apears
    $('.slick-arrow').parent().addClass('has-slick-arrow');

    // Removing Heading from search from in widget area
    $('#sidebar .form-title, #footer .form-title').remove();

    $(window).scroll(function() {
        $('.view-top').each(function() {
            if ((($(this).offset().top + $(this).outerHeight()) >= $(window).scrollTop()) &&
                ($(this).offset().top <= $(window).scrollTop() + $(window).height())) {
                $(this).addClass('from-top');
            }
        });

        $('.view-bottom').each(function() {
            if ((($(this).offset().top + $(this).outerHeight()) >= $(window).scrollTop()) &&
                ($(this).offset().top <= $(window).scrollTop() + $(window).height())) {
                $(this).addClass('from-bottom');
            }
        });

        $('.view-left').each(function() {
            if ((($(this).offset().top + $(this).outerHeight()) >= $(window).scrollTop()) &&
                ($(this).offset().top <= $(window).scrollTop() + $(window).height())) {
                $(this).addClass('from-left');
            }
        });

        $('.view-right').each(function() {
            if ((($(this).offset().top + $(this).outerHeight()) >= $(window).scrollTop()) &&
                ($(this).offset().top <= $(window).scrollTop() + $(window).height())) {
                $(this).addClass('from-right');
            }
        });
    });

    $('.section_licensing .column:nth-child(odd),.testimonialslide .slick-slide:nth-child(odd) .test_slide').addClass('view-top');
    $('.section_about .column:nth-child(odd), .section_offer .column:nth-child(odd)').addClass('view-left');
    $('.section_features .column:nth-child(odd), .section_licensing .column:nth-child(even), .section_about .column:nth-child(even)').addClass('view-right');
    $('.section_features .column:nth-child(even), .testimonialslide .slick-slide:nth-child(even) .test_slide, .section_offer .column:nth-child(even)').addClass('view-bottom');
});