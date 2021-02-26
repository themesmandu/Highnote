<?php
/**
 * Helper functions.
 *
 * @package Highnote
 */


if ( ! function_exists( 'highnote_get_theme_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function highnote_get_theme_option( $key = '' ) {

		$default_options = highnote_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array) get_theme_mod( 'highnote_theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;
	}

endif;
