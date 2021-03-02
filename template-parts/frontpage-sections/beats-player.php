<?php
/**
 * Template part for displaying fronpage beats player section
 *
 * @package Beatsmandu
 */


if ( get_theme_mod( 'beats_external_store' ) ) {
	?>
<section class="section-frontpage section_beats">
	<div class="overlay"></div>
	<div class="container beats-container">
		<div class="beats_store">
			<?php
			echo wp_kses_post( get_theme_mod( 'beats_external_store' ) );
			?>
		</div>
	</div>
</section>
	<?php
}


if ( get_theme_mod( 'highnote_player_shortcode' ) ) {
	?>
	<section class="section-frontpage section_beats">
	<div class="overlay"></div>
	<?php echo do_shortcode( get_theme_mod( 'highnote_player_shortcode' ) ); ?>
	</section>
<?php } ?>
