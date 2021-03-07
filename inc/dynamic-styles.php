<?php
/**
 * Theme specific dynamic styles.
 *
 * @package Beatsmandu
 */

/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function highnote_header_background_css() {
	?>
<!--Header background CSS-->
<style type="text/css">
	<?php if ( get_theme_mod( 'global_header_bg' ) && ! is_front_page() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( 'global_header_bg' ) ); ?>);}
	<?php endif; ?>

	<?php if ( get_theme_mod( 'blog_header_bg' ) && ! is_front_page() && is_home() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( 'blog_header_bg' ) ); ?>);}
	<?php endif; ?>

	<?php if ( get_theme_mod( 'single_header_bg' ) && is_single() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( 'single_header_bg' ) ); ?>);}
	<?php endif; ?>

	<?php if ( get_theme_mod( 'archive_header_bg' ) && is_archive() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( 'archive_header_bg' ) ); ?>);}
	<?php endif; ?>

	<?php if ( get_theme_mod( 'search_header_bg' ) && is_search() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( 'search_header_bg' ) ); ?>);}
	<?php endif; ?>

	<?php if ( get_theme_mod( 'page_header_bg' ) && is_page() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( 'page_header_bg' ) ); ?>);}
	<?php endif; ?>

	<?php if ( get_theme_mod( '404_header_bg' ) && is_404() ) : ?>
		#top-header .page-content {background-image: url(<?php echo esc_url( get_theme_mod( '404_header_bg' ) ); ?>);}
	<?php endif; ?>
</style>
	<?php
}
add_action( 'wp_head', 'highnote_header_background_css' );

/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function highnote_typography_mediascreen_css() {
	$highnote_heading_h1_tablet = get_theme_mod( 'typography_headings_h1_tablet' );
	$highnote_heading_h2_tablet = get_theme_mod( 'typography_headings_h2_tablet' );
	$highnote_heading_h3_tablet = get_theme_mod( 'typography_headings_h3_tablet' );
	$highnote_heading_h4_tablet = get_theme_mod( 'typography_headings_h4_tablet' );
	$highnote_heading_h5_tablet = get_theme_mod( 'typography_headings_h5_tablet' );
	$highnote_heading_h6_tablet = get_theme_mod( 'typography_headings_h6_tablet' );

	$highnote_heading_h1_mobile = get_theme_mod( 'typography_headings_h1_mobile' );
	$highnote_heading_h2_mobile = get_theme_mod( 'typography_headings_h2_mobile' );
	$highnote_heading_h3_mobile = get_theme_mod( 'typography_headings_h3_mobile' );
	$highnote_heading_h4_mobile = get_theme_mod( 'typography_headings_h4_mobile' );
	$highnote_heading_h5_mobile = get_theme_mod( 'typography_headings_h5_mobile' );
	$highnote_heading_h6_mobile = get_theme_mod( 'typography_headings_h6_mobile' );

	$highnote_sb_heading_tablet    = get_theme_mod( 'typography_slider_banner_tablet' );
	$highnote_sb_subheading_tablet = get_theme_mod( 'typography_slider_banner_subheading_tablet' );

	$highnote_sb_heading_mobile    = get_theme_mod( 'typography_slider_banner_mobile' );
	$highnote_sb_subheading_mobile = get_theme_mod( 'typography_slider_banner_subheading_mobile' );

	$highnote_fp_heading_tablet    = get_theme_mod( 'front_page_section_headings_tablet' );
	$highnote_fp_subheading_tablet = get_theme_mod( 'front_page_section_subheadings_tablet' );

	$highnote_fp_heading_mobile    = get_theme_mod( 'front_page_section_headings_mobile' );
	$highnote_fp_subheading_mobile = get_theme_mod( 'front_page_section_subheadings_mobile' );
	?>

<style type="text/css">
@media (max-width: 991px) {
		<?php if ( get_theme_mod( 'typography_headings_h1_tablet' ) ) : ?>
		h1 {font-size: <?php echo esc_html( $highnote_heading_h1_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h1_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h2_tablet' ) ) : ?>
		h2 {font-size: <?php echo esc_html( $highnote_heading_h2_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h2_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h3_tablet' ) ) : ?>
		h3 {font-size: <?php echo esc_html( $highnote_heading_h3_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h3_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h4_tablet' ) ) : ?>
		h4 {font-size: <?php echo esc_html( $highnote_heading_h4_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h4_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h5_tablet' ) ) : ?>
		h5 {font-size: <?php echo esc_html( $highnote_heading_h5_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h5_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h6_tablet' ) ) : ?>
		h6 {font-size: <?php echo esc_html( $highnote_heading_h6_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h6_tablet['line-height'] ); ?>;}
		<?php endif; ?>

		<?php if ( get_theme_mod( 'typography_slider_banner_tablet' ) ) : ?>
		header .beats-heading {font-size: <?php echo esc_html( $highnote_sb_heading_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_sb_heading_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_slider_banner_subheading_tablet' ) ) : ?>
		.beats-sub-heading {font-size: <?php echo esc_html( $highnote_sb_subheading_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_sb_subheading_tablet['line-height'] ); ?>;}
		<?php endif; ?>

		<?php if ( get_theme_mod( 'front_page_section_headings_tablet' ) ) : ?>
		.section-heading {font-size: <?php echo esc_html( $highnote_fp_heading_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_fp_heading_tablet['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'front_page_section_subheadings_tablet' ) ) : ?>
		.sec-description {font-size: <?php echo esc_html( $highnote_fp_subheading_tablet['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_fp_subheading_tablet['line-height'] ); ?>;}
		<?php endif; ?>
}
@media (max-width: 576px) {
		<?php if ( get_theme_mod( 'typography_headings_h1_mobile' ) ) : ?>
		h1 {font-size: <?php echo esc_html( $highnote_heading_h1_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h1_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h2_mobile' ) ) : ?>
		h2 {font-size: <?php echo esc_html( $highnote_heading_h2_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h2_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h3_mobile' ) ) : ?>
		h3 {font-size: <?php echo esc_html( $highnote_heading_h3_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h3_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h4_mobile' ) ) : ?>
		h4 {font-size: <?php echo esc_html( $highnote_heading_h4_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h4_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h5_mobile' ) ) : ?>
		h5 {font-size: <?php echo esc_html( $highnote_heading_h5_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h5_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_headings_h6_mobile' ) ) : ?>
		h6 {font-size: <?php echo esc_html( $highnote_heading_h6_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_heading_h6_mobile['line-height'] ); ?>;}
		<?php endif; ?>

		<?php if ( get_theme_mod( 'typography_slider_banner_mobile' ) ) : ?>
		header .beats-heading {font-size: <?php echo esc_html( $highnote_sb_heading_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_sb_heading_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'typography_slider_banner_subheading_mobile' ) ) : ?>
		.beats-sub-heading {font-size: <?php echo esc_html( $highnote_sb_subheading_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_sb_subheading_mobile['line-height'] ); ?>;}
		<?php endif; ?>

		<?php if ( get_theme_mod( 'front_page_section_headings_mobile' ) ) : ?>
		.section-heading {font-size: <?php echo esc_html( $highnote_fp_heading_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_fp_heading_mobile['line-height'] ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'front_page_section_subheadings_mobile' ) ) : ?>
		.sec-description {font-size: <?php echo esc_html( $highnote_fp_subheading_mobile['font-size'] ); ?>;line-height: <?php echo esc_html( $highnote_fp_subheading_mobile['line-height'] ); ?>;}
		<?php endif; ?>
}

</style>

	<?php
}
add_action( 'wp_head', 'highnote_typography_mediascreen_css', 9999 );

/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function highnote_feature_section_icon_mediascreen_css() {
	?>
<style type="text/css">
@media (max-width: 991px) and (min-width: 768px) {
	<?php if ( ! highnote_get_theme_option( 'feature_show_icon_tablet' ) ) : ?>
	.section_features .column i.icon {display: none;}
	<?php endif; ?>
}

@media (max-width: 767px) {
	<?php if ( ! highnote_get_theme_option( 'feature_show_icon_mobile' ) ) : ?>
	.section_features .column i.icon {display: none;}
	<?php endif; ?>
}
</style>
	<?php
}


	add_action( 'wp_head', 'highnote_feature_section_icon_mediascreen_css', 9999 );

	/**
 * Output generated a line of CSS from customizer values in header output.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 */
function highnote_sidebar_mediascreen_css() {
	?>
<style type="text/css">
@media (max-width: 991px) and (min-width: 768px) {
	<?php if ( highnote_get_theme_option( 'sidebar_hide_tablet' ) ) : ?>
	#sidebar {display: none;}
	<?php endif; ?>
}

@media (max-width: 767px) {
	<?php if ( highnote_get_theme_option( 'sidebar_hide_mobile' ) ) : ?>
	#sidebar {display: none;}
	<?php endif; ?>
}
</style>
	<?php
}


add_action( 'wp_head', 'highnote_sidebar_mediascreen_css', 9999 );

