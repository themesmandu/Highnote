<?php
/**
 * Template part for displaying head banner in front-page.php
 *
 * @link https://getbootstrap.com/docs/4.3/components/jumbotron/
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package highnote
 */

$heading    = get_theme_mod( 'banner_title' );
$subheading = get_theme_mod( 'banner_subtitle' );
$btn_link   = get_theme_mod( 'banner_button_link' );
$btn_label  = get_theme_mod( 'banner_button_label' );
$bg_img     = get_theme_mod( 'banner_bg_image' );

if ( ! empty( $bg_img ) ) {
	$img_url = wp_get_attachment_url( $bg_img );
}

if ( empty( $heading ) && empty( $subheading ) && empty( $bg_img ) && empty( $btn_label ) ) {
	return;
}
?>

<section class="jumbotron text-center header_jumbotron">
	<div class="container">
		<div class="content">
			<h1 class="beats-heading"><?php echo esc_html( $heading ); ?></h1>
			<h2 class="beats-sub-heading from-right"><?php echo esc_html( $subheading ); ?></h2>

			<?php if ( ! empty( $btn_label ) ) { ?>
			<a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-beats from-top">
				<?php echo esc_html( $btn_label ); ?>
			</a>
			<?php } ?>
		</div>
	</div>
</section>
