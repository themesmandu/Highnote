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

	/**
	 *
	 * Add Section
	 */
	$wp_customize->add_section(
		'blog_options',
		array(
			'title'      => __( 'Posts page Settings', 'highnote' ),
			'capability' => 'edit_theme_options',
			'priority'   => 170,
		)
	);

	// Settings.

	$wp_customize->add_setting(
		'blog_pagination_mode',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'highnote_sanitize_blog_pagination_mode',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_pagination_mode',
			array(
				'label'    => __( 'Posts page navigation', 'highnote' ),
				'section'  => 'blog_options',
				'settings' => 'blog_pagination_mode',
				'type'     => 'select',
				'choices'  => array(
					'standard' => __( 'Standard', 'highnote' ),
					'numeric'  => __( 'Numeric', 'highnote' ),
				),
				'priority' => '20',
			)
		)
	);

	$wp_customize->add_setting(
		'more_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'more_link',
			array(
				'label'       => __( 'Read More button', 'highnote' ),
				'description' => __( 'Enter the button name which is a link to the full post. You can leave this blank if you want to hide the button.', 'highnote' ),
				'section'     => 'blog_options',
				'type'        => 'text',
			)
		)
	);

	/**
	 * Post List helper function.
	 *
	 * @param array $args posts.
	 */
	function highnote_post_list( $args = array() ) {
		$args       = wp_parse_args( $args, array( 'numberposts' => '-1' ) );
		$posts      = get_posts( $args );
		$output     = array();
		$output[''] = esc_html__( '&mdash; Select Post &mdash;', 'highnote' );
		foreach ( $posts as $post ) {
			$thetitle  = $post->post_title;
			$getlength = strlen( $thetitle );
			$thelength = 32;

			$thetitle = substr( $thetitle, 0, $thelength );
			if ( $getlength > $thelength ) {
				$thetitle .= '...';
			};
			$output[ $post->ID ] = sprintf( '%s', esc_html( $thetitle ) );
		}
		return $output;
	}

	$wp_customize->add_setting(
		'post_dropdown_setting',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_dropdown_setting',
			array(
				'label'    => __( 'Featured Post', 'highnote' ),
				'section'  => 'blog_options',
				'settings' => 'post_dropdown_setting',
				'type'     => 'select',
				'choices'  => highnote_post_list(),
				'priority' => '10',
			)
		)
	);

	$wp_customize->add_setting(
		'blog_layout',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'highnote_sanitize_blog_layout',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_layout',
			array(
				'label'    => __( 'Layout Style', 'highnote' ),
				'section'  => 'blog_options',
				'settings' => 'blog_layout',
				'type'     => 'select',
				'choices'  => array(
					'list'     => esc_html__( 'List', 'highnote' ),
					'standard' => esc_html__( 'Standard', 'highnote' ),
				),
				'priority' => '15',
			)
		)
	);

	// END Options.
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
	* Header banner section.
	*/
	require get_template_directory() . '/inc/customizer/sections/head-banner-section.php';

	/**
	* Header slider section.
	*/
	require get_template_directory() . '/inc/customizer/sections/head-slider-section.php';

	/**
	* Additional color settings.
	*/
	require get_template_directory() . '/inc/customizer/colors.php';

	/**
	* General settings section.
	*/
	require get_template_directory() . '/inc/customizer/sections/general-settings-section.php';

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

