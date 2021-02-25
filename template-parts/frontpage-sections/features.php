<?php
/**
 * Template part for displaying fronpage Features section
 *
 * @package Beatsmandu
 */


?>
<section class="section_features section_two">
	<div class="overlay"></div>
	<div class="container">
	<?php if ( get_theme_mod( 'feature_title' ) || get_theme_mod( 'feature_desc' ) ) : ?>
		<div class="section_header">
			<?php if ( get_theme_mod( 'feature_title' ) ) : ?>
			<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'feature_title' ) ); ?></h2>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'feature_desc' ) ) : ?>
			<p class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'feature_desc' ) ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php
		$active_features = get_theme_mod( 'front_features' );
		if ( $active_features ) {
			?>
		<div class="row">
			<?php foreach ( $active_features as $key => $active_feature ) : ?>
			<div class="col-lg-4 column <?php echo esc_attr( $active_feature['feature_highlight'] ? 'selected' : '' ); ?>">
				<div class="column-content">
					<?php if ( $active_feature['feature_icon'] ) : ?>
					<i class="<?php echo esc_html( $active_feature['feature_icon'] ); ?>"></i>
					<?php endif; ?>
					<div class="content">
						<h2>0<?php echo esc_html( $key + 1 ); ?></h2>
						<?php if ( $active_feature['feature_title'] ) : ?>
						<h3><?php echo esc_html( $active_feature['feature_title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $active_feature['feature_description'] ) : ?>
						<p><?php echo esc_html( $active_feature['feature_description'] ); ?></p>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php } ?>
	</div>
</section>
