<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Highnote
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_position' ) === 'none' ) {
	return;
}

if ( get_theme_mod( 'sidebar_position' ) === 'right' ) {
	$highnote_sidebar_order = 'right-order';
} elseif ( get_theme_mod( 'sidebar_position' ) === 'left' ) {
	$highnote_sidebar_order = 'left-order';
} else {
	$highnote_sidebar_order = 'right-order';
}
?>

<aside id="sidebar" class="widget-area col-lg-4 col-md-5 <?php echo esc_attr( $highnote_sidebar_order ); ?>">
	<div class="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
