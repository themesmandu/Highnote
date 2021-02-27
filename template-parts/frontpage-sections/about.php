<?php

/**
 * Template part for displaying fronpage about section
 *
 * @package Beatsmandu
 */

?>
<?php if (get_theme_mod('about_title') || get_theme_mod('about_desc') || get_theme_mod('about_button_label') || get_theme_mod('about_button_link')) : ?>
	<section class="section-frontpage section_about section_five">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 column">
					<div class="section_header">
						<?php if (get_theme_mod('about_title')) : ?>
							<h2 class="section-heading"><?php echo esc_html(get_theme_mod('about_title')); ?></h2>
						<?php endif; ?>
						<?php if (get_theme_mod('about_sub_title')) : ?>
							<h3 class="sec-description"><?php echo wp_kses_post(get_theme_mod('about_sub_title')); ?></h3>
						<?php endif; ?>
					</div>
					<?php if (get_theme_mod('about_desc')) : ?>
						<div class="paragraph">
							<?php echo wp_kses_post(wpautop(get_theme_mod('about_desc'))); ?>
						</div>
					<?php endif; ?>
					<?php if (get_theme_mod('about_button_label') || get_theme_mod('about_button_link')) : ?>
						<a href="<?php echo esc_url(get_theme_mod('about_button_link')); ?>" class="btn btn-beats"><?php echo esc_html(get_theme_mod('about_button_label')); ?></a>
					<?php endif; ?>
				</div>

				<?php if (get_theme_mod('about_featured_img')) : ?>
					<div class="col-lg-6 column order-left">
						<figure>
							<img src="<?php echo esc_url(get_theme_mod('about_featured_img')); ?>" />
						</figure>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>