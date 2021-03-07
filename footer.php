<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Highnote
 */

?>

</div><!-- #content -->


<footer id="footer">
	<div class="overlay"></div>
	<div class="container">
		<?php
		$active = array();
		for ($i = 1; $i <= 4; $i++) {
			if (is_active_sidebar('footer-' . $i)) {
				$active[] = $i;
			}
		}
		?>
		<?php
		if (0 !== count($active)) {
			if (4 === count($active)) {
				$highnote_footer_class = 'col-lg-3';
			} elseif (3 === count($active)) {
				$highnote_footer_class = 'col-lg-4';
			} elseif (2 === count($active)) {
				$highnote_footer_class = 'col-lg-6';
			} elseif (1 === count($active)) {
				$highnote_footer_class = 'col-lg-12';
			}
		?>
			<div id="footer-widgets" class="row content">
				<?php foreach ($active as $footer_widget_id) : ?>
					<div class="<?php echo esc_attr($highnote_footer_class); ?> col-sm-6 column">
						<?php dynamic_sidebar('footer-' . $footer_widget_id); ?>
					</div>
				<?php endforeach; ?>
			</div><!-- #footer-widgets -->
		<?php } ?>

		<div class="footer_content_wrap content">
			<?php if (get_theme_mod('footer_title')) : ?>
				<h2 class="beats-heading"><?php echo esc_html(get_theme_mod('footer_title')); ?></h2>
			<?php endif; ?>

			<?php
			if (has_nav_menu('footer')) :
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'footer-nav',
					)
				);
			endif;
			?>
			<?php if (get_theme_mod('footer_copyright')) : ?>
				<div class="site-info">
					<?php echo wp_kses_post(get_theme_mod('footer_copyright')); ?>
				</div><!-- .site-info -->
			<?php endif; ?>

			<?php
			if (has_nav_menu('social')) :
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_id'        => 'social-menu',
						'menu_class'     => 'footer-social-nav',
					)
				);
			endif;
			?>
		</div>
	</div><!-- .container -->
	<button class="up-btn btn-beats" id="up-btn" title="<?php echo esc_html(__('Go to top', 'highnote')); ?>"><i class="top-icon">&#x2191;</i></button>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>