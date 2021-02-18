<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highnote
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_position' ) === 'none' ) {
	return;
}

if ( get_theme_mod( 'sidebar_position' ) === 'right' ) {
	$highnote_sidebar_order = 'order-last';
} elseif ( get_theme_mod( 'sidebar_position' ) === 'left' ) {
	$highnote_sidebar_order = 'order-first';
} else {
	$highnote_sidebar_order = 'order-last';
}
?>

<aside id="secondary" class="widget-area col-md-4 <?php echo esc_attr( $highnote_sidebar_order ); ?>">		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
