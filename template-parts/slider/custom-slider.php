<?php
/**
 * Custom Slider.
 *
 * @package Highnote
 */

if ( is_front_page() && ! is_home() && get_theme_mod( 'slider_toggle' ) ) : ?>
	<?php
	$active_sliders = get_theme_mod( 'slider_contents' );
	if ( $active_sliders ) {
		?>

<div id="wizards_slider">
	<div class="slide-img-wrap">
		<ul class="slider-list">
		<?php foreach ( $active_sliders as $active_slider ) : ?>
			<li><img src="<?php echo esc_url( wp_get_attachment_url( $active_slider['slider_img'] ) ); ?>" alt="<?php echo esc_url( wp_get_attachment_url( $active_slider['slider_img'] ) ); ?>" title="<?php echo esc_html( $active_slider['slider_heading'] ); ?>" />
				<?php if ( $active_slider['slider_subheading'] ) : ?>
				<h2 class="beats-sub-heading from-bottom"><?php echo esc_html( $active_slider['slider_subheading'] ); ?></h2>
				<?php endif; ?>
				<?php if ( $active_slider['slider_button_text'] || $active_slider['slider_button_link'] ) : ?>
				<button><a href="<?php echo esc_url( $active_slider['slider_button_link'] ); ?>" class="btn btn-beats"><?php echo esc_html( $active_slider['slider_button_text'] ); ?></a></button>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>

	</div>
		<?php if ( highnote_get_theme_option( 'slide_bullet' ) ) : ?>
	<div class="slider_bullets">
			<?php foreach ( $active_sliders as $key => $active_slider ) : ?>
		<a href="#" class="btn btn-beats">
			<figure><img src="<?php echo esc_url( wp_get_attachment_url( $active_slider['slider_img'] ) ); ?>"
					alt="<?php echo esc_url( wp_get_attachment_url( $active_slider['slider_img'] ) ); ?>" /></figure>
			<span><?php echo esc_html( $key + 1 ); ?></span>
		</a>
		<?php endforeach; ?>

	</div>
		<?php endif; ?>
</div>

<?php } ?>
	<?php endif; ?>
