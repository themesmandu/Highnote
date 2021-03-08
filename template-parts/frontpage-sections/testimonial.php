<?php

/**
 * Template part for displaying fronpage Testimonial section
 *
 * @package Highnote
 */

?>
<?php if ( get_theme_mod( 'testimonial_title' ) || get_theme_mod( 'testimonial_desc' ) ) : ?>
	<section class="section-frontpage section_review section_six">
		<div class="overlay"></div>
		<div class="container">
			<?php if ( get_theme_mod( 'testimonial_title' ) || get_theme_mod( 'testimonial_desc' ) ) : ?>
				<div class="section_header">
					<?php if ( get_theme_mod( 'testimonial_title' ) ) : ?>
						<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'testimonial_title' ) ); ?></h2>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'testimonial_desc' ) ) : ?>
						<h3 class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'testimonial_desc' ) ); ?></h3>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php
			$active_tesimonials = get_theme_mod( 'testimonials' );
			if ( $active_tesimonials ) {
				?>
				<div class="testimonialslide">
					<?php foreach ( $active_tesimonials as $key => $active_tesimonial ) : ?>
						<div class="test_slide view-<?php echo esc_attr( $active_tesimonial['column_animation'] ); ?>" style="animation-duration:<?php echo esc_attr( $active_tesimonial['column_animation_speed'] ); ?>s;">
							<?php if ( $active_tesimonial['image'] ) : ?>
								<img src="<?php echo esc_url( wp_get_attachment_url( $active_tesimonial['image'] ) ); ?>" alt="<?php echo esc_html__( 'Testinomial Image', 'highnote' ); ?>">
							<?php endif; ?>
							<?php if ( $active_tesimonial['testimony'] || $active_tesimonial['name'] ) : ?>
								<div class="description">
									<?php if ( $active_tesimonial['testimony'] ) : ?>
										<p><?php echo esc_html( $active_tesimonial['testimony'] ); ?></p>
									<?php endif; ?>
									<?php if ( $active_tesimonial['name'] ) : ?>
										<span class="name"><?php echo esc_html( $active_tesimonial['name'] ); ?></span>
									<?php endif; ?>
									<?php if ( $active_tesimonial['companynamerank'] ) : ?>
										<span class="company"><?php echo esc_html( $active_tesimonial['companynamerank'] ); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php } ?>
		</div>
	</section>
<?php endif; ?>
