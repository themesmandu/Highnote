<?php
/**
 * Template part for displaying fronpage offer section
 *
 * @package Beatsmandu
 */

?>
<?php if ( get_theme_mod( 'offer_title' ) || get_theme_mod( 'offer_desc' ) ) : ?>
<section class="section_offer section_eight">
<<<<<<< HEAD
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <?php if ( get_theme_mod( 'offer_title' ) || get_theme_mod( 'offer_desc' ) ) : ?>
            <div class="column col-md-6">
                <div class="section_header">
                    <?php if ( get_theme_mod( 'offer_title' ) ) : ?>
                    <h2 class="section-heading"><?php echo wp_kses_post( get_theme_mod( 'offer_title' ) ); ?></h2>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'offer_desc' ) ) : ?>
                    <h3 class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'offer_desc' ) ); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( get_theme_mod( 'offer_sub_section_title' ) || get_theme_mod( 'offer_ribbon_label' ) || get_theme_mod( 'offer_sub_section_sub_title' ) || get_theme_mod( 'offer_sub_section_desc' ) ) : ?>
            <div class="column col-md-6">
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
=======
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<?php if ( get_theme_mod( 'offer_title' ) || get_theme_mod( 'offer_desc' ) ) : ?>
			<div class="column header-column">
				<div class="section_header">
					<?php if ( get_theme_mod( 'offer_title' ) ) : ?>
					<h2 class="section-heading"><?php echo wp_kses_post( get_theme_mod( 'offer_title' ) ); ?></h2>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'offer_desc' ) ) : ?>
					<h3 class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'offer_desc' ) ); ?></h3>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'offer_sub_section_title' ) || get_theme_mod( 'offer_ribbon_label' ) || get_theme_mod( 'offer_sub_section_sub_title' ) || get_theme_mod( 'offer_sub_section_desc' ) ) : ?>
			<div class="column content-column">
				<div class="column-content">
					<?php if ( get_theme_mod( 'offer_sub_section_title' ) || get_theme_mod( 'offer_ribbon_label' ) ) : ?>
					<div class="offer-wrap">
						<?php if ( get_theme_mod( 'offer_sub_section_title' ) ) : ?>
						<h5 class="offer-headline">
							<?php echo wp_kses_post( get_theme_mod( 'offer_sub_section_title' ) ); ?></h5>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'offer_ribbon_label' ) ) : ?>
						<h6 class="ribbon"><?php echo wp_kses_post( get_theme_mod( 'offer_ribbon_label' ) ); ?></h6>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'offer_sub_section_sub_title' ) ) : ?>
					<h6 class="offer-detail">
						<?php echo wp_kses_post( get_theme_mod( 'offer_sub_section_sub_title' ) ); ?></h6>
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
>>>>>>> c9df8aa2be6815db96d7a1055b1863ff35e6778e