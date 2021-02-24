<?php
/**
 * Template part for displaying fronpage contact section
 *
 * @package Beatsmandu
 */

?>
<?php if ( get_theme_mod( 'contact_title' ) || get_theme_mod( 'contact_desc' ) ) : ?>
<section class="section_contact section_seven">
	<div class="overlay"></div>
	<div class="container">
		<?php if ( get_theme_mod( 'contact_title' ) || get_theme_mod( 'contact_desc' ) ) : ?>
		<div class="section_header">
			<?php if ( get_theme_mod( 'contact_title' ) ) : ?>
			<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'contact_title' ) ); ?></h2>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'contact_desc' ) ) : ?>
			<p class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'contact_desc' ) ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php
		if ( get_theme_mod( 'contact_shortcode' ) ) :
			echo do_shortcode( get_theme_mod( 'contact_shortcode' ) );
			endif;
		?>
	</div>
</section>
<?php endif; ?>
