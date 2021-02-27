<?php
/**
 * Template part for displaying fronpage offer section
 *
 * @package Beatsmandu
 */

?>
<?php if ( get_theme_mod( 'offer_title' ) || get_theme_mod( 'offer_desc' ) ) : ?>
<section class="section-frontpage section_offer section_eight">
	<div class="overlay"></div>
	<div class="container container-boxed">
		<div class="row">
			<?php if ( get_theme_mod( 'offer_title' ) || get_theme_mod( 'offer_desc' ) ) : ?>
			<div class="column col-lg-6">
				<div class="section_header">
					<?php if ( get_theme_mod( 'offer_title' ) ) : ?>
					<h2 class="column-heading"><?php echo wp_kses_post( get_theme_mod( 'offer_title' ) ); ?></h2>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'offer_desc' ) ) : ?>
					<h3 class="col-description"><?php echo wp_kses_post( get_theme_mod( 'offer_desc' ) ); ?></h3>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'offer_sub_section_title' ) || get_theme_mod( 'offer_ribbon_label' ) || get_theme_mod( 'offer_sub_section_sub_title' ) || get_theme_mod( 'offer_sub_section_desc' ) ) : ?>
			<div class="column col-lg-6">
				<div class="column-content">
					<?php if ( get_theme_mod( 'offer_sub_section_title' ) || get_theme_mod( 'offer_ribbon_label' ) ) : ?>
					<div class="offer-wrap">
						<?php if ( get_theme_mod( 'offer_sub_section_title' ) ) : ?>
						<h4 class="offer-headline">
							<?php echo wp_kses_post( get_theme_mod( 'offer_sub_section_title' ) ); ?></h4>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'offer_ribbon_label' ) ) : ?>
						<span class="ribbon"><?php echo wp_kses_post( get_theme_mod( 'offer_ribbon_label' ) ); ?></span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'offer_sub_section_sub_title' ) ) : ?>
					<h5 class="offer-detail">
						<?php echo wp_kses_post( get_theme_mod( 'offer_sub_section_sub_title' ) ); ?></h5>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'offer_sub_section_desc' ) ) : ?>
					<p class="offer-description">
						<?php echo wp_kses_post( get_theme_mod( 'offer_sub_section_desc' ) ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>
