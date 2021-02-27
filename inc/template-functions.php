<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package highnote
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function highnote_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'highnote_pingback_header' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function highnote_body_classes( $classes ) {
	/* using mobile browser */
	if ( wp_is_mobile() ) {
		$classes[] = 'wp-is-mobile';
	} else {
		$classes[] = 'wp-is-not-mobile';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class if the front-page.
	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}
	// Adds a class if the customizer preview.
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-preview';
	}
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'highnote_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the article element.
 * @return array
 */
function highnote_post_classes( $classes ) {
	$classes[] = ( has_post_thumbnail() ? 'has-thumbnail' : 'no-thumbnail' );

	if ( is_front_page() || is_home() || is_archive() ) {
		$classes[] = 'post-preview';
	}
	return $classes;
}
add_action( 'post_class', 'highnote_post_classes' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @param string $link link for link text.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function highnote_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	if ( get_theme_mod( 'more_link' ) ) {
		$link  = '...';
		$link .= sprintf(
			'<p><a href="%1$s" class="more-link">%2$s</a></p>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %2$s: Name of current post */
			sprintf( __( '%1$s<span class="screen-reader-text">%2$s</span>', 'highnote' ), esc_html( get_theme_mod( 'more_link' ) ), get_the_title( get_the_ID() ) )
		);
	} else {
		$link = '...';
	}
	return $link;
}
add_filter( 'excerpt_more', 'highnote_excerpt_more' );
add_filter( 'the_content_more_link', 'highnote_excerpt_more' );

/**
 * Responsive Image class from Bootstrap
 * which appended to automatically generated image classes
 *
 * @param string $html responsive image class.
 */
function highnote_bootstrap_class_images( $html ) {
	$classes = 'img-fluid'; // separated by spaces, e.g. 'img image-link'
	// check if there are already classes assigned to the anchor.
	if ( preg_match( '/<img.*? class="/', $html ) ) {
		$html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . '$2', $html );
	} else {
		$html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '"$2', $html );
	}
	return $html;
}
add_filter( 'the_content', 'highnote_bootstrap_class_images', 10 );

/**
 * Added table class from Bootstrap
 *
 * @param string $content boottrap table class.
 */
function highnote_bootstrap_table_class( $content ) {
	return str_replace( '<table', '<table class="table"', $content );
}
add_filter( 'the_content', 'highnote_bootstrap_table_class' );

/**
 * Adds a class to the navigation links of posts
 */
function highnote_posts_link_attributes() {
	return 'class="btn btn-light"';
}
add_filter( 'next_posts_link_attributes', 'highnote_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'highnote_posts_link_attributes' );

/**
 * Comment form container.
 */
function highnote_comment_form_wrap_start() {
	echo '<div class="card my-4"><div class="card-body">';
}

/**
 * Comment form wrapper.
 */
function highnote_comment_form_wrap_end() {
	echo '</div></div>';
}
add_action( 'comment_form_after', 'highnote_comment_form_wrap_end' );
add_action( 'comment_form_before', 'highnote_comment_form_wrap_start' );

/**
 * Add custom class to comment reply link.
 *
 * @param string $content comment reply link class.
 */
function highnote_comment_reply_link( $content ) {
	$extra_classes = 'btn btn-primary';
	return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content );
}
add_filter( 'comment_reply_link', 'highnote_comment_reply_link', 99 );

/**
 * Custom Excerpt lengths.
 */
function highnote_custom_excerpt_length() {
	return 16;
}
add_filter( 'excerpt_length', 'highnote_custom_excerpt_length' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function highnote_front_page( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'highnote_front_page' );

/**
 * Adds nav-link class on menu.
 *
 * @param array $classes Classes for the menu items.
 * @return array
 */
function highnote_add_classes_on_link_attributes( $classes ) {
	$classes['class'] = 'nav-link';
	return $classes;
}
add_filter( 'nav_menu_link_attributes', 'highnote_add_classes_on_link_attributes' );
