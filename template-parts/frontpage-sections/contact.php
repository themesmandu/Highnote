<?php
/**
 * Template part for displaying fronpage contact section
 *
 * @package Highnote
 */

?>
<?php if ( get_theme_mod( 'contact_title' ) || get_theme_mod( 'contact_desc' ) ) : ?>
<section class="section-frontpage section_contact section_seven">
	<div class="overlay"></div>
	<div class="container">
		<?php if ( get_theme_mod( 'contact_title' ) || get_theme_mod( 'contact_desc' ) ) : ?>
		<div class="section_header">
			<?php if ( get_theme_mod( 'contact_title' ) ) : ?>
			<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'contact_title' ) ); ?></h2>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'contact_desc' ) ) : ?>
			<h3 class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'contact_desc' ) ); ?></h3>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="column view-<?php echo esc_attr( get_theme_mod( 'contact_column_animation' ) ); ?>">
		<?php
		if ( get_theme_mod( 'contact_shortcode' ) ) :
			echo do_shortcode( get_theme_mod( 'contact_shortcode' ) );
			endif;
		?>
		</div>
	</div>
</section>
<?php endif; ?>
