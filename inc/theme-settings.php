<?php
/**
 * Check and setup theme's default settings
 *
 * @package highnote
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'highnote_setup_theme_default_settings' ) ) {
	function highnote_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$highnote_posts_index_style = get_theme_mod( 'highnote_posts_index_style' );
		if ( '' == $highnote_posts_index_style ) {
			set_theme_mod( 'highnote_posts_index_style', 'default' );
		}

		// Sidebar position.
		$highnote_sidebar_position = get_theme_mod( 'highnote_sidebar_position' );
		if ( '' == $highnote_sidebar_position ) {
			set_theme_mod( 'highnote_sidebar_position', 'right' );
		}

		// Container width.
		$highnote_container_type = get_theme_mod( 'highnote_container_type' );
		if ( '' == $highnote_container_type ) {
			set_theme_mod( 'highnote_container_type', 'container' );
		}
	}
}
