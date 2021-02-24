<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highnote
 */

?>

</div><!-- #content -->


<footer id="footer">

	<div class="container">
		<div class="site-info">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Powered by %s', 'highnote'), '<a href="https://wordpress.org/">WordPress</a>');
			?>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			sprintf(esc_html__('&copy; %1$s %2$s by %3$s', 'highnote'), date('Y'), esc_html(wp_get_theme()->get('Name')), '&nbsp;<a target="_blank" href="' . esc_url(wp_get_theme()->get('AuthorURI')) . '">' . esc_html(ucwords(wp_get_theme()->get('Author'))) . '</a>');
			?>
		</div><!-- .site-info -->
	</div><!-- .container -->
	<button class="up-btn btn-beats" id="up-btn" title="<?php echo esc_html(__('Go to top', 'ghumgham')); ?>" style="display: block;"><i class="fas fa-chevron-up"></i></button>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
/* -- slick slider java script -- */
jQuery(document).ready(function($) {
	$(document).on('ready', function() {
		$(".testimonialslide").slick({
			dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1
		});
	});
})
</script>

</body>

</html>