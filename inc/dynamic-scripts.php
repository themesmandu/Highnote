<?php
/**
 * Theme specific dynamic scripts.
 *
 * @package Beatsmandu
 */

// Image Slider ko jQuery ho hai

function highnote_dynamic_slider_script() {
	if ( is_front_page() && ! is_home() && get_theme_mod( 'slider_toggle' ) ) {
		?>
		<script type="text/javascript">
			jQuery("#wizards_slider").wizSlider({
				<?php $animations = highnote_get_theme_option( 'slider_animations' ); ?>
				effect: "<?php foreach ( $animations as $animation ) : ?>
					<?php echo esc_html( $animation ) . ','; ?>
			<?php endforeach; ?> ",
			duration: <?php echo esc_html( highnote_get_theme_option( 'slide_duration' ) ) * 1000; ?>,
			delay: <?php echo esc_html( highnote_get_theme_option( 'slide_delay' ) ) * 1000; ?>,
			width: 1920,
			height: 1060,
			autoPlay: <?php echo ( highnote_get_theme_option( 'slide_autoplay' ) ? 'true' : 'false' ); ?>,
			autoPlayVideo: false,
			playPause: <?php echo ( highnote_get_theme_option( 'slide_pauseplay' ) ? 'true' : 'false' ); ?>,
			stopOnHover: <?php echo ( highnote_get_theme_option( 'slide_hover' ) ? 'true' : 'false' ); ?>,
			loop: <?php echo ( highnote_get_theme_option( 'slide_loop' ) ? 'true' : 'false' ); ?>,
			bullets: 1,
			caption: <?php echo ( highnote_get_theme_option( 'slide_caption' ) ? 'true' : 'false' ); ?>,
			controls: <?php echo ( highnote_get_theme_option( 'slide_control' ) ? 'true' : 'false' ); ?>,
			responsive: 2,
			fullScreen: true,
			gestures: <?php echo ( highnote_get_theme_option( 'slide_gesture' ) ? '2' : '1' ); ?>,
			onBeforeStep: 0,
			images: 0
			});
		</script>
		<?php
	}
}

add_action( 'wp_footer', 'highnote_dynamic_slider_script', 20 );

function highnote_dynamic_slider_testimonial_script() {
	if ( is_front_page() && ! is_home() ) {
		?>
		<script>
			jQuery(".testimonialslide").slick({
				infinite: true,
				slidesToShow: <?php echo esc_html( highnote_get_theme_option( 'testimonial_rows' ) ); ?>,
				arrows: <?php echo ( get_theme_mod( 'testimonial_slide_nav_arrows_toggle' ) ? 'true' : 'false' ); ?>,
				slidesToScroll: 1,
				dots: <?php echo ( get_theme_mod( 'testimonial_slide_nav_dots_toggle' ) ? 'true' : 'false' ); ?>,
				autoplay: <?php echo ( highnote_get_theme_option( 'testimonial_slide_autoplay_toggle' ) ? 'true' : 'false' ); ?>,
				autoplaySpeed: <?php echo esc_html( highnote_get_theme_option( 'testimonial_slide_autoplay_speed' ) ) * 1000; ?>,
				speed: <?php echo esc_html( highnote_get_theme_option( 'testimonial_slide_speed' ) ) * 100; ?>,
				cssEase: 'ease-in-out',
				responsive: [{
					breakpoint: 767,
					settings: {
						slidesToShow: 1
					}
				}]
			});
		</script>
		<?php
	}
}

add_action( 'wp_footer', 'highnote_dynamic_slider_testimonial_script', 21 );
