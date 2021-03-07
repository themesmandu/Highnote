<?php
/**
 * highnote Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package highnote
 */

/**
 * Register different customizer features.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function highnote_customize_register( $wp_customize ) {

	/**
	 *
	 * Add postMessage support for site title and description for the Theme Customizer.
	 */
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.navbar-brand',
				'render_callback' => 'highnote_customize_partial_blogname',
			)
		);
	}


}
add_action( 'customize_register', 'highnote_customize_register' );

if ( class_exists( 'Kirki' ) ) {

	/**
	 *
	 * Add Panel Typography Settings
	 */
	Kirki::add_panel(
		'typography_options',
		array(
			'priority' => 190,
			'title'    => esc_html__( 'Typography', 'highnote' ),
		)
	);

	/**
	* Typography general section.
	*/
	require get_template_directory() . '/inc/customizer/sections/typography-general-section.php';

	/**
	* Typography headings section.
	*/
	require get_template_directory() . '/inc/customizer/sections/typography-headings-section.php';

	/**
	* Typography slider and banner section.
	*/
	require get_template_directory() . '/inc/customizer/sections/typography-slider-banner.php';

	/**
	* Typography frotn page headings section.
	*/
	require get_template_directory() . '/inc/customizer/sections/typography-front-page-sections.php';

	/**
	* Header banner section.
	*/
	require get_template_directory() . '/inc/customizer/sections/head-banner-section.php';

	/**
	* Header slider section.
	*/
	require get_template_directory() . '/inc/customizer/sections/head-slider-section.php';

	/**
	* Header background section.
	*/
	require get_template_directory() . '/inc/customizer/sections/header-background.php';

	/**
	* Additional color settings.
	*/
	require get_template_directory() . '/inc/customizer/colors.php';

	/**
	* General settings section.
	*/
	require get_template_directory() . '/inc/customizer/sections/general-settings-section.php';

	/**
	* Post page section.
	*/
	require get_template_directory() . '/inc/customizer/sections/post-page-section.php';

	/**
	* Footer section.
	*/
	require get_template_directory() . '/inc/customizer/sections/footer-settings-section.php';


	/**
	*
	* Add Panel Front Page Settings
	*/
	Kirki::add_panel(
		'frontpage_options',
		array(
			'priority'        => 190,
			'title'           => __( 'Front Page Settings', 'highnote' ),
			'active_callback' => 'highnote_set_front_page',

		)
	);

	/**
	* Front page sortable sections.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/front-page-sortable.php';

	/**
	* Offer section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/offer-section.php';

	/**
	* Beats player section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/beats-player-section.php';

	/**
	* Features section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/features-section.php';

	/**
	* Pricing Table section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/pricing-table-section.php';

	/**
	* FAQS section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/faqs-section.php';

	/**
	* About section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/about-section.php';

	/**
	* Testimonial section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/testimonial-section.php';

	/**
	* Contact section.
	*/
	require get_template_directory() . '/inc/customizer/sections/front-page/contact-section.php';
}



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function highnote_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 *
 * Helper function for Contextual Control
 * Whether the static page is set to a front displays
 * https://developer.wordpress.org/reference/classes/wp_customize_control/active_callback/
 */
function highnote_set_front_page() {
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return true;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function highnote_customize_preview_js() {
	wp_enqueue_script( 'highnote-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '25032018', true );
}
add_action( 'customize_preview_init', 'highnote_customize_preview_js' );

function highnote_post_page_setting_js() {
	wp_enqueue_script( 'highnote-post-page-setting-js', get_template_directory_uri() . '/assets/admin/customizer/js/post-page-setting.js', array( 'customize-controls' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'highnote_post_page_setting_js' );

function highnote_kirki_multicheck_css() {
	wp_enqueue_style( 'highnote-multickeck', get_template_directory_uri() . '/assets/admin/customizer/css/kirki-multicheck.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'customize_controls_print_styles', 'highnote_kirki_multicheck_css' );

