<?php

/**
 * The site header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highnote
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div id="page" class="site<?php echo esc_attr( ( is_front_page() && ! is_home() && get_theme_mod( 'banner_toggle' ) && get_theme_mod( 'menubar_absolute' ) ) ? ' with-banner' : '' ); ?><?php echo esc_attr( ( is_front_page() && ! is_home() && ! get_theme_mod( 'slider_toggle' ) && ! get_theme_mod( 'banner_toggle' ) && get_theme_mod( 'menubar_absolute' ) ) ? ' without-banner-slider' : '' ); ?>">
		<header id="top-header" class="site-header" role="banner">
			<?php if ( get_theme_mod( 'skip_to_content_toggle' ) ) : ?>
				<a class="skip-link screen-reader-text btn btn-beats" href="#content"><?php esc_html_e( 'To the content', 'highnote' ); ?></a>
			<?php endif; ?>

			<?php
			if ( get_theme_mod( 'menubar_mode' ) === 'alt' ) {
				// alternative navigation bar:
				// left: logo, main menu - right: search form or something.
				get_template_part( 'template-parts/navigation/main-navbar', 'alt' );
			} else {
				// standard navigation bar:
				// left: logo - right: main menu.
				get_template_part( 'template-parts/navigation/main-navbar' );
			}

			//header page title.
			highnote_header_page_title();
			?>
			<?php

			if ( is_front_page() && ! is_home() && get_theme_mod( 'banner_toggle' ) ) {
				// head banner on the front page if it enabled.
				get_template_part( 'template-parts/jumbotron' );
			}
			?>
			<?php get_template_part( 'template-parts/slider/custom-slider' ); ?>

		</header><!-- #masthead -->

		<div id="content" class="content-wrap">
