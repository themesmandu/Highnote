<?php
/**
 * Template part for displaying fronpage Features section
 *
 * @package Beatsmandu
 */

$active_features = get_theme_mod( 'front_features' );
if ( $active_features ) {
	?>
<section class="section_features section_two">
	<div class="overlay"></div>
	<div class="container">
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
	</div>
</section>
<?php } ?>
