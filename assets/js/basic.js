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
            $('.main-navigation').addClass('fixed');
        } else {
            $('.main-navigation').removeClass('fixed');
        }
    });

    // Added class on dropdown menu span
    if ($(document).width() < 1200) {
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
});