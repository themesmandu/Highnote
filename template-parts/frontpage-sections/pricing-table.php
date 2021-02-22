<?php
/**
 * Template part for displaying fronpage Pricing Table section
 *
 * @package Beatsmandu
 */

if ( ! get_theme_mod( 'pricing_table_shortcode' ) ) :
	$active_tables = get_theme_mod( 'pricing_tables' );
	if ( $active_tables ) {
		$class_count     = count( $active_tables );
		$container_class = 'container_' . $class_count;
	}
endif;

?>
<section class="section_licensing section_three">
	<div class="overlay"></div>
	<div class="container <?php echo esc_html( ! get_theme_mod( 'pricing_table_shortcode' ) ? $container_class : '' ); ?> ">
		<?php if ( get_theme_mod( 'pricing_table_title' ) || get_theme_mod( 'pricing_table_desc' ) ) : ?>
		<div class="section_header">
			<?php if ( get_theme_mod( 'pricing_table_title' ) ) : ?>
			<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'pricing_table_title' ) ); ?></h2>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'pricing_table_desc' ) ) : ?>
			<h3 class="sec-description"><?php echo wp_kses_post( wpautop( get_theme_mod( 'pricing_table_desc' ) ) ); ?>
			</h3>
			<?php endif; ?>

		</div>
		<?php endif; ?>
		<?php
		if ( get_theme_mod( 'pricing_table_shortcode' ) ) :
			echo do_shortcode( get_theme_mod( 'pricing_table_shortcode' ) );
		else :
			$active_tables = get_theme_mod( 'pricing_tables' );
			if ( $active_tables ) {
				?>
		<div class="row table-<?php echo count( $active_tables ); ?> ">
				<?php foreach ( $active_tables as $key => $active_table ) : ?>
					<?php
					$table_currency = '<span class="currency">' . $active_table['table_currency'] . '</span>';
					if ( 4 === count( $active_tables ) || 8 === count( $active_tables ) ) {
						$column_class = 3;
					} else {
						$column_class = 4;
					}
					?>
			<div
				class="col-md-<?php echo esc_attr( $column_class ); ?> table-col-<?php echo esc_attr( count( $active_tables ) ); ?>">
				<div class="col-wrap <?php echo esc_attr( $active_table['table_highlight'] ? 'highlighted' : '' ); ?>">
					<div class="col-content">
						<?php if ( $active_table['table_title'] ) : ?>
						<h3 class="type"><?php echo esc_html( $active_table['table_title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $active_table['table_subtitle'] ) : ?>
						<h4 class="sub-type"><?php echo esc_html( $active_table['table_subtitle'] ); ?></h4>
						<?php endif; ?>
						<h2 class="price">
							<?php echo wp_kses_post( 'first' === $active_table['table_currency_position'] ? $table_currency : '' ); ?><?php echo wp_kses_post( $active_table['table_price'] ); ?><?php echo wp_kses_post( 'last' === $active_table['table_currency_position'] ? $table_currency : '' ); ?>
						</h2>
						<?php if ( $active_table['table_features'] ) : ?>
						<ul class="features">
							<?php echo wp_kses_post( wpautop( $active_table['table_features'] ) ); ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php } ?>
		<?php endif; ?>

<?php
$active_tables_two = get_theme_mod( 'pricing_tables_two' );
if ( $active_tables_two ) {
	?>
		<div class="row custom_beat_row">
		<?php foreach ( $active_tables_two as $key => $active_table_two ) : ?>
			<?php $table_currency_two = '<span class="currency">' . $active_table_two['table_currency'] . '</span>'; ?>
			<div class="col-lg-6 column">
				<div class="column-wrap">
					<div class="header-wrap">
					<?php if ( $active_table_two['table_title'] || $active_table_two['table_subtitle'] ) : ?>
						<div class="heading">
						<?php if ( $active_table_two['table_title'] ) : ?>
							<h4 class="type"><?php echo esc_html( $active_table_two['table_title'] ); ?></h4>
							<?php endif; ?>
							<?php if ( $active_table_two['table_subtitle'] ) : ?>
							<p class="description"><?php echo esc_html( $active_table_two['table_subtitle'] ); ?></p>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						<h2 class="price">
						<?php echo wp_kses_post( 'first' === $active_table_two['table_currency_position'] ? $table_currency_two : '' ); ?><?php echo wp_kses_post( $active_table_two['table_price'] ); ?><?php echo wp_kses_post( 'last' === $active_table_two['table_currency_position'] ? $table_currency_two : '' ); ?>
						</h2>
						<?php if ( $active_table_two['table_button_label'] ) : ?>
						<a href="<?php echo esc_url( $active_table_two['table_button_link'] ); ?>" class="btn-contact"><?php echo esc_html( $active_table_two['table_button_label'] ); ?></a>
						<?php endif; ?>
					</div>

					<div class="content-wrap">
					<?php if ( $active_table_two['table_features'] ) : ?>
						<ul class="features">
						<?php echo wp_kses_post( wpautop( $active_table_two['table_features'] ) ); ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
		<?php } ?>
	</div>
</section>

<?php if ( get_theme_mod( 'pricing_table_shortcode' ) ) : ?>
<script>
// Add class row in price plugin

jQuery("#rpt_pricr div").first().addClass('row');
jQuery('.rpt_recommended_plan').parent().addClass('premium-row');
</script>
<?php endif; ?>
