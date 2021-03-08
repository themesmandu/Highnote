<?php
/**
 * Template part for displaying fronpage Pricing Table section
 *
 * @package Beatsmandu
 */

?>
<?php if ( get_theme_mod( 'pricing_table_title' ) || get_theme_mod( 'pricing_table_desc' ) ) : ?>
	<section class="section-frontpage section_licensing section_three">
		<div class="overlay"></div>
		<div class="container">
			<?php if ( get_theme_mod( 'pricing_table_title' ) || get_theme_mod( 'pricing_table_desc' ) ) : ?>
				<div class="section_header">
					<?php if ( get_theme_mod( 'pricing_table_title' ) ) : ?>
						<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'pricing_table_title' ) ); ?></h2>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'pricing_table_desc' ) ) : ?>
						<h3 class="sec-description"><?php echo wp_kses_post( get_theme_mod( 'pricing_table_desc' ) ); ?></h3>
					<?php endif; ?>

				</div>
			<?php endif; ?>
			<?php
				$active_tables = get_theme_mod( 'pricing_tables' );
			if ( $active_tables ) {
				?>
					<div class="row pricing-row table-<?php echo count( $active_tables ); ?> ">
					<?php foreach ( $active_tables as $key => $active_table ) : ?>
							<?php
							$table_currency = '<span class="currency">' . $active_table['table_currency'] . '</span>';
							if ( 3 === count( $active_tables ) || 6 === count( $active_tables ) ) {
								$column_class = 4;
							} else {
								$column_class = 3;
							}
							?>
							<div class="col-lg-<?php echo esc_attr( $column_class ); ?> column <?php echo esc_attr( $active_table['table_highlight'] ? 'highlighted' : '' ); ?> view-<?php echo esc_attr( $active_table['table_column_animation'] ); ?>" style="animation-duration:<?php echo esc_attr( $active_table['table_column_animation_speed'] ); ?>s;">
								<div class="col-wrap">
									<div class="col-content">
										<?php if ( $active_table['table_title'] ) : ?>
											<h4 class="type"><?php echo esc_html( $active_table['table_title'] ); ?></h4>
										<?php endif; ?>
										<?php if ( $active_table['table_subtitle'] ) : ?>
											<span class="sub-type"><?php echo esc_html( $active_table['table_subtitle'] ); ?></span>
										<?php endif; ?>
										<?php if ( $active_table['table_price'] ) : ?>
										<h5 class="price">
											<?php echo wp_kses_post( 'first' === $active_table['table_currency_position'] ? $table_currency : '' ); ?><?php echo wp_kses_post( $active_table['table_price'] ); ?><?php echo wp_kses_post( 'last' === $active_table['table_currency_position'] ? '<span class="currency last">' . $active_table['table_currency'] . '</span>' : '' ); ?>
										</h5>
										<?php endif; ?>
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

			<?php
			$active_tables_two = get_theme_mod( 'pricing_tables_two' );
			if ( $active_tables_two ) {
				?>
				<div class="row custom_beat_row">
					<?php foreach ( $active_tables_two as $key => $active_table_two ) : ?>
						<?php $table_currency_two = '<span class="currency">' . $active_table_two['table_currency'] . '</span>'; ?>
						<div class="col-lg-6 column view-<?php echo esc_attr( $active_table_two['table_column_animation'] ); ?>" style="animation-duration:<?php echo esc_attr( $active_table_two['table_column_animation_speed'] ); ?>s;">
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
									<?php if ( $active_table_two['table_price'] ) : ?>
									<h4 class="price">
										<?php echo wp_kses_post( 'first' === $active_table_two['table_currency_position'] ? $table_currency_two : '' ); ?><?php echo wp_kses_post( $active_table_two['table_price'] ); ?><?php echo wp_kses_post( 'last' === $active_table_two['table_currency_position'] ? '<span class="currency last">' . $active_table_two['table_currency'] . '</span>' : '' ); ?>
									</h4>
									<?php endif; ?>
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
<?php endif; ?>
