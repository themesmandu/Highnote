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
	 * Add settings to Colors section
	 */
	$theme_colors = array();

	$theme_colors[] = array(
		'slug'      => 'menu_bar_bgcolor',
		'default'   => '#ffffff',
		'label'     => esc_html__( 'Main Menu Bar Background', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'menu_color',
		'default'   => '#ffffff',
		'label'     => esc_html__( 'Main Menu Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'menu_hover_color',
		'default'   => '#f3ca7a',
		'label'     => esc_html__( 'Main Menu Hover Color', 'highnote' ),
		'transport' => 'refresh',
	);
	$theme_colors[] = array(
		'slug'      => 'site_title_color',
		'default'   => '#ffffff',
		'label'     => esc_html__( 'Site Title Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'main_color',
		'default'   => '#ffffff',
		'label'     => esc_html__( 'Main Text Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'title_color',
		'default'   => '#212529',
		'label'     => esc_html__( 'Entry/Post/Page Title Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'entry_bgcolor',
		'default'   => '#ffffff',
		'label'     => esc_html__( 'Entry Card Background', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'entry_footer_bgcolor',
		'default'   => '#ffffff',
		'label'     => esc_html__( 'Entry Card: Footer Background', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'wgt_title_color',
		'default'   => '#212529',
		'label'     => esc_html__( 'Widget Title Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'link_color',
		'default'   => '#007bff',
		'label'     => esc_html__( 'Text Link Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'link_hover_color',
		'default'   => '#0056b3',
		'label'     => esc_html__( 'Text Link Hover Color', 'highnote' ),
		'transport' => 'refresh',
	);
	$theme_colors[] = array(
		'slug'      => 'meta_color',
		'default'   => '#212529',
		'label'     => esc_html__( 'Meta Text Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'highnote_btn_color',
		'default'   => '#0062cc',
		'label'     => esc_html__( 'Highnote Starter Button Background Color', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'highnote_btn_hover_color',
		'default'   => '#0069d9',
		'label'     => esc_html__( 'Highnote Starter Button Background: Hover Color', 'highnote' ),
		'transport' => 'refresh',
	);
	$theme_colors[] = array(
		'slug'      => 'footer_bgcolor',
		'default'   => '#343a40',
		'label'     => esc_html__( 'Footer Background', 'highnote' ),
		'transport' => 'postMessage',
	);
	$theme_colors[] = array(
		'slug'      => 'footer_color',
		'default'   => '#6c757d',
		'label'     => esc_html__( 'Footer Text Color', 'highnote' ),
		'transport' => 'postMessage',
	);

	foreach ( $theme_colors as $color ) {
		$wp_customize->add_setting(
			$color['slug'],
			array(
				'default'           => $color['default'],
				'type'              => 'theme_mod', // 'option'
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => $color['transport'],
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'],
				array(
					'label'    => $color['label'],
					'section'  => 'colors',
					'settings' => $color['slug'],
				)
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
 * Sanitize the menu bar layout options.
 *
 * @param string $input Menu bar layout.
 */
function highnote_sanitize_menubar_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'highnote' ),
		'alt'      => __( 'Alternative', 'highnote' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the main menu drop-down mode option.
 *
 * @param string $input options.
 */
function highnote_sanitize_mainmenu_dropdown_mode( $input ) {
	$valid = array(
		'default'   => __( 'Default', 'highnote' ),
		'bootstrap' => __( 'Bootstrap', 'highnote' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the sidebar position options.
 *
 * @param string $input Sidebar position options.
 */
function highnote_sanitize_sidebar_position( $input ) {
	$valid = array(
		'right' => __( 'Right sidebar', 'highnote' ),
		'left'  => __( 'Left sidebar', 'highnote' ),
		'none'  => __( 'No sidebar', 'highnote' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the navigation mode options.
 *
 * @param string $input navigation mode options.
 */
function highnote_sanitize_blog_pagination_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'highnote' ),
		'numeric'  => __( 'Numeric', 'highnote' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the blog layout options.
 *
 * @param string $input blog layout options.
 */
function highnote_sanitize_blog_layout( $input ) {
	$valid = array(
		'list'     => esc_html__( 'List', 'highnote' ),
		'standard' => esc_html__( 'Standard', 'highnote' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function highnote_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
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

/**
 * This will generate a line of CSS for use in header output. If the setting
 * ($mod_name) has no defined value, the CSS will not be output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * @uses get_theme_mod()
 * @param string $selector CSS selector.
 * @param string $style The name of the CSS *property* to modify.
 * @param string $mod_name The name of the 'theme_mod' option to fetch.
 * @param string $prefix Optional. Anything that needs to be output before the CSS property.
 * @param string $postfix Optional. Anything that needs to be output after the CSS property.
 * @param bool   $echo Optional. Whether to print directly to the page (default: true).
 * @return string Returns a single line of CSS with selectors and a property.
 */
function highnote_generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
	$return = '';
	$mod    = esc_html( get_theme_mod( $mod_name ) );
	if ( ! empty( $mod ) ) {
		$return = sprintf(
			'%s { %s:%s; }',
			$selector,
			$style,
			$prefix . $mod . $postfix
		);
		if ( $echo ) {
			echo $return; // WPCS: XSS OK.
		}
	}
	return $return;
}


/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function highnote_customizer_css() {
	?>
	<!--Customizer CSS--> 
	<style type="text/css">
		<?php
			highnote_generate_css( '.front-page .jumbotron', 'background-color', 'banner_bg_color' );
			highnote_generate_css( '.navbar', 'background-color', 'menu_bar_bgcolor' );
			highnote_generate_css( '.navbar .navbar-nav .nav-link', 'color', 'menu_color' );
			highnote_generate_css( '.menu-item-has-children:after', 'color', 'menu_color' );
			highnote_generate_css( '.navbar .navbar-nav .nav-link:hover', 'color', 'menu_hover_color' );
			highnote_generate_css( '.navbar .navbar-brand, .navbar .navbar-brand:hover', 'color', 'site_title_color' );
			highnote_generate_css( 'body', 'color', 'main_color' );
			highnote_generate_css( '.entry-title, .entry-title a, .page-title', 'color', 'title_color' );
			highnote_generate_css( 'a', 'color', 'link_color' );
			highnote_generate_css( 'a:hover', 'color', 'link_hover_color' );
			highnote_generate_css( '.entry-footer, .entry-meta', 'color', 'meta_color' );
			highnote_generate_css( '.post .card-body', 'background-color', 'entry_bgcolor' );
			highnote_generate_css( '.post .card-footer', 'background-color', 'entry_footer_bgcolor' );
			highnote_generate_css( '.widget-title', 'color', 'wgt_title_color' );
			highnote_generate_css( '.btn-highnote', 'background-color', 'highnote_btn_color' );
			highnote_generate_css( '.btn-highnote:hover', 'background-color', 'highnote_btn_hover_color' );
			highnote_generate_css( '#footer', 'background-color', 'footer_bgcolor' );
			highnote_generate_css( '#footer', 'color', 'footer_color' );
		?>

	</style>
	<?php
}
add_action( 'wp_head', 'highnote_customizer_css' );
