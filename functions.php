<?php
/**
 * highnote functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package highnote
 */

if ( ! function_exists( 'highnote_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function highnote_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on highnote, use a find and replace
		 * to change 'highnote' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'highnote', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Custom Image Sizes.
		add_image_size( 'highnote-thumb-750-300', 750, 300, true ); // crop.
		add_image_size( 'highnote-featured-900-600', 900, 600, true ); // crop.
		add_image_size( 'highnote-cover-image', 1200, 9999 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'highnote' ),
				'social'  => esc_html__( 'Social Menu', 'highnote' ),
				'footer'  => esc_html__( 'Footer Menu', 'highnote' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom background feature.
		 *
		 * @link https://codex.wordpress.org/Custom_Backgrounds
		 */
		$defaults = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'highnote_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function highnote_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'highnote_content_width', 640 );
}
add_action( 'after_setup_theme', 'highnote_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function highnote_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'highnote' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'highnote' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer widget number. */
				'name'          => sprintf( esc_html__( 'Footer Widgets %d', 'highnote' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Add widgets here.', 'highnote' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'highnote_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function highnote_scripts() {

	// Bootstrap reboot styles.
	wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/vendor/bootstrap-src/css/bootstrap-reboot.min.css', array( 'highnote-style' ), '5.0.0' );

	// Bootstrap styles.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap-src/css/bootstrap.min.css', array( 'highnote-style' ), '5.0.0' );

	// Theme styles.
	wp_enqueue_style( 'highnote-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Loading main stylesheet.
	wp_enqueue_style( 'main-css', get_theme_file_uri( '/assets/css/main.css' ), array( 'highnote-style' ), wp_get_theme()->get( 'Version' ) );

	// Loading navbar menu stylesheet.
	wp_enqueue_style( 'menu-css', get_theme_file_uri( '/assets/css/menu.css' ), array( 'highnote-style' ), wp_get_theme()->get( 'Version' ) );

	// Loading mediascreen stylesheet.
	wp_enqueue_style( 'mediascreen-css', get_theme_file_uri( '/assets/css/mediascreen.css' ), array( 'highnote-style' ), wp_get_theme()->get( 'Version' ) );

	// Loading image slider stylesheet.
	wp_enqueue_style( 'custom-image-slider-css', get_theme_file_uri( '/assets/css/custom-image-slider.css' ), array( 'highnote-style' ), wp_get_theme()->get( 'Version' ) );

	// Add font-awesome fonts, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/font-awesome-5.7.2/css/all.css' ), array( 'highnote-style' ), '5.7.2' );

	// Loading EDD styles stylesheet.
	wp_enqueue_style( 'edd-styles-css', get_theme_file_uri( '/assets/css/edd-styles.css' ), array( 'highnote-style' ), wp_get_theme()->get( 'Version' ) );
	
	// Bootstrap core JavaScript: jQuery first, then Popper.js, then Bootstrap JS.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap-src/js/bootstrap.bundle.min.js', array(), '5.0.0', true );

	if ( is_front_page() && ! is_home() && get_theme_mod( 'slider_toggle' ) ) {
		// jQuery of custom image slider
		wp_enqueue_script( 'slider-script-js', get_theme_file_uri( '/assets/js/wizslider.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	}

	// Theme added JavaScript: Added by Developers.
	wp_enqueue_script( 'highnote-basic', get_template_directory_uri() . '/assets/js/basic.js', array(), wp_get_theme()->get( 'Version' ), true );

	// Theme added JavaScript: Added by Developers For Slick Slider.
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array(), wp_get_theme()->get( 'Version' ), true );

	// Theme added EDD plugin: Added by Developers.
	wp_enqueue_script( 'highnote-edd-plugin', get_template_directory_uri() . '/assets/js/edd-plugin.js', array(), wp_get_theme()->get( 'Version' ), true );

	// Font Nunito And Advent Pro
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Advent+Pro:400,600,700|Nunito:400,600,700&display=swap', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'highnote_scripts' );

/**
 * Load theme required files.
 */
require get_template_directory() . '/inc/init.php';

