jQuery(document).ready(function($) {
    //Remove button class blue from plugin button and add theme default button class
    // $('.button').removeClass('edd-submit blue').addClass('btn btn-beats');
    if ($(document).width() > 1200) {
        //Open item cart on cart button hover
        $('.main-navigation .beats_cart').hover(function() {
            $(this).children('.cart_content').fadeIn(100);
        });

        $('.main-navigation .beats_cart').on('mouseleave', function() {
            $(this).children('.cart_content').fadeOut(100);
        });
    }

    if ($(document).width() <= 1200) {
        //Show cart contents on cart button click
        $('.main-navigation .nav-cart .btn-cart').click(function() {
            $('.main-navigation .nav-cart .cart_content').fadeIn().toggleClass('appear');
            $('.main-navigation #navbarCollapse').addClass('overlay');
        });
        $('.main-navigation .nav-cart .cart_content .btn-close').click(function() {
            $('.main-navigation .nav-cart .cart_content').fadeOut().removeClass('appear');
            $('.main-navigation #navbarCollapse').removeClass('overlay');
        });
    }

    // Add class on list of edd price options
    var li_count = $('.edd_download_purchase_form .edd_price_options li').length;
    $('.edd_download_purchase_form .edd_price_options ul').addClass('price-list price-list-' + li_count);

    // Added and removed classes of checked radio button in price dropdown and pop up
    $('.edd_download_purchase_form .edd_price_options label input[type="radio"]:checked').parent('label').parent().addClass('selected');
    $('.edd_download_purchase_form .edd_price_options label').click(function() {
        $(this).parent().addClass('selected').siblings().removeClass('selected');
    });

    // Removing unwanted tags
    $('.edd_download_purchase_form .edd_price_options .edd_price_option_sep').remove();
});