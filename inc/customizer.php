<?php
/**
 * highnote Theme Customizer
 *
 * @package highnote
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'highnote_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function highnote_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'highnote_customize_register' );

if ( ! function_exists( 'highnote_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function highnote_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'highnote_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'highnote' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'highnote' ),
				'priority'    => 160,
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function highnote_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'highnote_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'highnote_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'highnote_container_type',
				array(
					'label'       => __( 'Container Width', 'highnote' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'highnote' ),
					'section'     => 'highnote_theme_layout_options',
					'settings'    => 'highnote_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'highnote' ),
						'container-fluid' => __( 'Full width container', 'highnote' ),
					),
					'priority'    => '10',
				)
			)
		);

		$wp_customize->add_setting(
			'highnote_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'highnote_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'highnote' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'highnote'
					),
					'section'           => 'highnote_theme_layout_options',
					'settings'          => 'highnote_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'highnote_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'highnote' ),
						'left'  => __( 'Left sidebar', 'highnote' ),
						'both'  => __( 'Left & Right sidebars', 'highnote' ),
						'none'  => __( 'No sidebar', 'highnote' ),
					),
					'priority'          => '20',
				)
			)
		);
	}
} // endif function_exists( 'highnote_theme_customize_register' ).
add_action( 'customize_register', 'highnote_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'highnote_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function highnote_customize_preview_js() {
		wp_enqueue_script(
			'highnote_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'highnote_customize_preview_js' );
