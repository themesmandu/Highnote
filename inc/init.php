<?php
/**
 * Load files
 *
 * @package highnote
 */

/**
 * Load WordPress nav walker.
 */
require get_template_directory() . '/inc/class-highnote-wp-bootstrap-navwalker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer defaults.
 */
require get_template_directory() . '/inc/customizer/defaults.php';

/**
 * Helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Dynamic styles.
 */
require get_template_directory() . '/inc/dynamic-styles.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Include tgm required plaugins functionality.
 */
require get_template_directory() . '/inc/tgm-plugin/tgm-required-plugins.php';


if ( class_exists( 'Kirki' ) ) {
	/**
	 * Kirki configs.
	 */
	require get_template_directory() . '/inc/kirki-config.php';
}

