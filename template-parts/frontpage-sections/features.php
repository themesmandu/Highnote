<?php
/**
 * Template part for displaying fronpage Features section
 *
 * @package Beatsmandu
 */


?>
<section class="section-frontpage section_features section_two">
	<div class="overlay"></div>
	<div class="container">
	<?php if ( get_theme_mod( 'feature_title' ) || get_theme_mod( 'feature_desc' ) ) : ?>
		<div class="section_header">
			<?php if ( get_theme_mod( 'feature_title' ) ) : ?>
			<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'feature_title' ) ); ?></h2>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'feature_desc' ) ) : ?>
			<h3 class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'feature_desc' ) ); ?></h3>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php
		$active_features = get_theme_mod( 'front_features' );
		if ( $active_features ) {
			?>
		<div class="row table-<?php echo count( $active_features ); ?>">
			<?php foreach ( $active_features as $key => $active_feature ) : ?>
				<?php
				if ( 3 === count( $active_features ) || 6 === count( $active_features ) ) {
					$column_class_feature = 4;
				} else {
					$column_class_feature = 3;
				}
				?>
			<div class="col-md-<?php echo esc_attr( $column_class_feature ); ?> column <?php echo esc_attr( $active_feature['feature_highlight'] ? 'selected' : '' ); ?> view-<?php echo esc_attr( $active_feature['feature_column_animation'] ); ?>" style="animation-duration:<?php echo esc_attr( $active_feature['feature_column_animation_speed'] ); ?>s;">
				<div class="column-content">
					<?php if ( $active_feature['feature_icon'] && highnote_get_theme_option( 'feature_show_icon' ) ) : ?>
					<i class="icon <?php echo esc_html( $active_feature['feature_icon'] ); ?>"></i>
					<?php endif; ?>
					<div class="content">
						<?php if ( $active_feature['feature_title'] ) : ?>
						<h3 class="count"><?php echo wp_kses_post( $active_feature['feature_title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $active_feature['feature_subtitle'] ) : ?>
						<h4 class="title"><?php echo esc_html( $active_feature['feature_subtitle'] ); ?></h4>
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
