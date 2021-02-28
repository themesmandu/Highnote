<?php
/**
 * Template part for displaying fronpage beats player section
 *
 * @package Beatsmandu
 */


if ( get_theme_mod( 'beats_external_store' ) ) {
	?>
<section class="section-frontpage section_beats">
	<div class="overlay"></div>
	<div class="container beats-container">
		<div class="beats_store">
			<?php
			echo get_theme_mod( 'beats_external_store' );
			?>
		</div>
	</div>
</section>
	<?php
} else {
	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		?>
<section class="section-frontpage section_beats">
	<div class="overlay"></div>
	<div class="container beats-container">
		<div class="beats_store">
			<?php if ( get_theme_mod( 'beats_player_search_toggle', true ) || get_theme_mod( 'beats_player_cart_toggle', true ) || get_theme_mod( 'beats_player_filters_toggle', true ) ) : ?>
			<nav class="navbar navbar-beats">
				<?php if ( get_theme_mod( 'beats_player_search_toggle', true ) ) : ?>
				<div class="beats-search">
					<i class="fas fa-search"></i>
					<input type="text" placeholder="search track types" class="form-control form-control-sm"
						id="beat_search_input">
				</div>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'beats_player_filters_toggle', true ) ) : ?>
				<div class="navbar-nav">
					<ul class="filters_list">
						<li class="list sort_by"><span><?php echo esc_html__( 'Sort By', 'highnote' ); ?></span></li>
						<li class="list filter_type" id="category-filter">
							<span><?php echo esc_html__( 'Category', 'highnote' ); ?></span>
							<ul></ul>
						</li>
						<li class="list filter_type" id="gener-filter">
							<span><?php echo esc_html__( 'Genre', 'highnote' ); ?></span>
							<ul>
							</ul>
						</li>
						<li class="list filter_type" id="tags-filter">
							<span><?php echo esc_html__( 'Tags', 'highnote' ); ?>
							</span>
							<ul>
							</ul>
						</li>
						<li class="list" id="hide_track"><span><?php echo esc_html__( 'Clear', 'highnote' ); ?></span>
						</li>
					</ul>
				</div>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'beats_player_cart_toggle', true ) ) : ?>
				<div class="beats_cart menu-item">
					<button class="btn-cart">
						<i class="fas fa-shopping-cart"></i>
						<span class="cart-total">
							<?php
							edd_cart_total();
							?>
						</span>
					</button>

					<div class="cart_content">
						<div class="cart-wrap"><?php the_widget( 'edd_cart_widget' ); ?></div>
					</div>
				</div>
				<?php endif; ?>
			</nav>
			<?php endif; ?>

			<div class="beats_table">
				<table
					class="table tracks-table <?php echo ( ! highnote_get_theme_option( 'beats_player_bpm_column_toggle' ) ? 'table_bpm' : '' ); ?> <?php echo ( highnote_get_theme_option( 'beats_player_download_toggle' ) ? 'bt_download_btn' : '' ); ?> <?php echo ( highnote_get_theme_option( 'beats_player_tag_column_toggle' ) ? 'table_tags' : '' ); ?> <?php echo ( highnote_get_theme_option( 'beats_player_download_toggle' ) && highnote_get_theme_option( 'beats_player_tag_column_toggle' ) ? 'table_download_tags' : '' ); ?> <?php echo ( ! highnote_get_theme_option( 'beats_player_bpm_column_toggle' ) && ! highnote_get_theme_option( 'beats_player_tag_column_toggle' ) ? 'bpm_tags' : '' ); ?> <?php echo ( ! highnote_get_theme_option( 'beats_player_bpm_column_toggle' ) && ! highnote_get_theme_option( 'beats_player_download_toggle' ) ? 'bpm_download' : '' ); ?> <?php echo ( ! highnote_get_theme_option( 'beats_player_bpm_column_toggle' ) && ! highnote_get_theme_option( 'beats_player_tag_column_toggle' ) && ! highnote_get_theme_option( 'beats_player_download_toggle' ) ? 'bpm_download_tags' : '' ); ?>">
					<thead>
						<tr>
							<th class="track_num"><?php echo esc_html__( 'SN', 'highnote' ); ?></th>
							<th class="track_title"><?php echo esc_html__( 'Title', 'highnote' ); ?></th>
							<th class="track_time"><?php echo esc_html__( 'Time', 'highnote' ); ?></th>
							<?php if ( highnote_get_theme_option( 'beats_player_bpm_column_toggle' ) ) : ?>
							<th class="track_bpm"><?php echo esc_html__( 'BPM', 'highnote' ); ?></th>
							<?php endif; ?>
							<?php if ( highnote_get_theme_option( 'beats_player_tag_column_toggle' ) ) : ?>
							<th class="track_tags"><?php echo esc_html__( 'Tags', 'highnote' ); ?></th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php
							$args = array(
								'fields'        => 'ids',
								'post_type'     => 'download',
								'no_found_rows' => true,
								'numberposts'   => -1,
							);

							$downloads = get_posts( $args );
							foreach ( $downloads as $key => $download_id ) {
								$download_id;
								$download    = new EDD_Download( $download_id );
								$category    = wp_strip_all_tags( get_the_term_list( $download_id, 'download_category', '', ',' ) );
								$genre       = wp_strip_all_tags( get_the_term_list( $download_id, 'genre', '', ',' ) );
								$tags        = wp_strip_all_tags( get_the_term_list( $download_id, 'download_tag', '', ',' ) );
								$tags_link   = get_the_term_list( $download_id, 'download_tag', '', ',' );
								$track       = get_post_meta( $download_id, 'ecpt_audiofile', true );
								$produced_by = get_post_meta( $download_id, 'ecpt_producedby', true );
								$tempo       = get_post_meta( $download_id, 'ecpt_bpm', true );
								if ( wp_get_attachment_url( get_post_thumbnail_id( $download_id ) ) ) :
									$track_thumb = wp_get_attachment_url( get_post_thumbnail_id( $download_id ) );
								else :
									$track_thumb = get_template_directory_uri() . '/assets/images/music-avatar.png';
								endif;
								?>
						<tr class="track_lk <?php echo esc_attr( $_GET['trackid'] == $download_id ? 'shared_track' : '' ); ?>"
							id="track_lk_<?php echo esc_html( $key ); ?>" data-index="<?php echo esc_html( $key ); ?>"
							data-title="<?php echo esc_html( $download->post_title ); ?>"
							data-thumb="<?php echo esc_url( $track_thumb ); ?>"
							data-track="<?php echo esc_url( $track ); ?>"
							data-by="<?php echo esc_html( $produced_by ); ?>"
							data-gener="<?php echo esc_html( $genre ); ?>" data-tag="<?php echo esc_html( $tags ); ?>"
							data-category="<?php echo esc_html( $category ); ?>">
							<td class="play_track">
								<span><?php echo esc_html( $key + 1 ); ?></span>
								<button class="track-play-from-list btn-beats">
									<i class="dashicons dashicons-controls-play"></i>
								</button>
							</td>
							<td class="track_title">
								<img src="<?php echo esc_url( $track_thumb ); ?>" width="45">
								<h4><?php echo esc_html( $download->post_title ); ?></h4>
							</td>
							<td class="beats_time">
								<span>
									<?php
									echo esc_html( highnote_get_duration( $track ) );
									?>
								</span>
							</td>
								<?php if ( highnote_get_theme_option( 'beats_player_bpm_column_toggle' ) ) : ?>
							<td class="beats_pm">
								<span><?php echo esc_html( $tempo ); ?></span>
							</td>
							<?php endif; ?>
								<?php if ( highnote_get_theme_option( 'beats_player_tag_column_toggle' ) ) : ?>
							<td class="beats_tags">
								<span><?php echo wp_kses_post( $tags_link ); ?></span>
							</td>
							<?php endif; ?>
							<td class="beats_share">
								<div class="share_wrap">
									<i class="fas fa-share-alt"></i>
									<div class="beats_share">
										<div class="overlay"></div>
										<div class="beats-form">
											<button class="btn-beats beats-close">

												<i class="fas fa-times"></i>
											</button>
											<div class="form-content">
												<h3 class="bts-asset-bg">
													<?php echo esc_html__( 'Share: ', 'highnote' ); ?>
													<span><?php echo esc_html( $download->post_title ); ?></span>
												</h3>
												<div class="form-wrap">
													<label><?php echo esc_html__( 'Full URL: ', 'highnote' ); ?></label>
													<input class="share_url" type="url"
														value="<?php echo esc_url( home_url( '?trackid=' . $download_id ) ); ?>">
													<button
														class="beats-share-copy btn-beats"><?php echo esc_html__( 'copy url', 'highnote' ); ?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</td>
								<?php if ( highnote_get_theme_option( 'beats_player_download_toggle' ) ) : ?>
							<td class="beats_download">
								<a download href="<?php echo esc_url( $track ); ?>" target="_blank"><button
										class="btn beats-download-btn"><i class="fas fa-download"></i></button></a>
							</td>
							<?php endif; ?>


								<?php if ( get_theme_mod( 'beats_player_atc_style', 'dropdown' ) === 'dropdown' ) : ?>
							<td class="beats_tocart_btn">
								<button class="btn price_btn btn-drop btn-beats">
									<i class="fas fa-shopping-basket"></i>
									<?php
									if ( substr( wp_strip_all_tags( edd_price( $download_id, false ) ), 5 ) === '0.00' ) {
										echo esc_html__( 'Free', 'highnote' );
									} else {
										edd_price( $download_id );
									}
										echo edd_get_purchase_link(
											array(
												'download_id' => $download_id,
												'direct' => false,
												'text'   => '',
												'style'  => 'button',
											)
										);
									?>
								</button>
							</td>
							<?php endif; ?>

							<td class="beats_price">
								<?php if ( get_theme_mod( 'beats_player_atc_style', 'dropdown' ) === 'dropdown' ) : ?>
								<button class="btn price_btn btn-drop btn-beats">
									<i class="fas fa-shopping-basket"></i>
									<?php
									if ( substr( wp_strip_all_tags( edd_price( $download_id, false ) ), 5 ) === '0.00' ) {
										echo esc_html__( 'Free', 'highnote' );
									} else {
										edd_price( $download_id );
									}
									echo edd_get_purchase_link(
										array(
											'download_id' => $download_id,
											'direct'      => false,
											'text'        => '',
											'style'       => 'button',
										)
									);
									?>
								</button>
								<?php endif; ?>
								<?php if ( get_theme_mod( 'beats_player_atc_style' ) === 'popup' ) : ?>
								<button class="btn price_btn btn-pop btn-beats">
									<i class="fas fa-shopping-basket"></i>
									<?php
									if ( substr( wp_strip_all_tags( edd_price( $download_id, false ) ), 5 ) === '0.00' ) {
										echo esc_html__( 'Free', 'highnote' );
									} else {
											edd_price( $download_id );
									}
											echo edd_get_purchase_link(
												array(
													'download_id' => $download_id,
													'direct' => false,
													'text' => '',
													'style' => 'button',
												)
											);
									?>
								</button>
								<?php endif; ?>
								<?php if ( get_theme_mod( 'beats_player_atc_style' ) === 'popup' ) : ?>
								<div class="cart-pop-up" id="cartpopup">
									<div class="overlay"></div>
									<div class="form-wrap">
										<button class="btn-pop btn-beats">
											<i class="fas fa-times"></i>
										</button>

										<div class="content">
											<div class="row">
												<?php if ( wp_get_attachment_url( get_post_thumbnail_id( $download_id ) ) ) { ?>
												<figure class="col-md-2 column">
													<img
														src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( $download_id ) ) ); ?>">
												</figure>
												<?php } ?>
												<?php if ( wp_get_attachment_url( get_post_thumbnail_id( $download_id ) ) ) { ?>
												<div class="col-md-10 column">
													<?php } else { ?>
													<div class="col-md-12 column">
														<?php } ?>
														<h4><?php echo esc_html( $download->post_title ); ?></h4>
														<span
															class="produced-by"><?php echo esc_html__( 'Produced By', 'highnote' ); ?>
															<?php echo esc_html( $produced_by ); ?></span>

														<table>
															<tr>
																<?php if ( $genre ) { ?>
																<th><span><?php echo esc_html__( 'Genre', 'highnote' ); ?></span>
																</th>
																<?php } ?>
																<?php if ( $category ) { ?>
																<th><span><?php echo esc_html__( 'Category', 'highnote' ); ?></span>
																</th>
																<?php } ?>
															</tr>
															<tr>
																<?php if ( $genre ) { ?>
																<td>
																	<span
																		class="genre beats-span"><?php echo esc_html( $genre ); ?></span>
																</td>
																<?php } ?>
																<?php if ( $tempo ) { ?>
																<td>
																	<span
																		class="category beats-span"><?php echo esc_html( $category ); ?></span>
																</td>
																<?php } ?>
															</tr>
														</table>
													</div>
												</div>
											</div>

											<?php
											echo edd_get_purchase_link(
												array(
													'download_id' => $download_id,
													'direct' => false,
													'text' => 'Add to cart',
													'style' => 'button',
												)
											);
											?>
										</div>
									</div>
								</div>
								<?php endif; ?>

								<?php if ( get_theme_mod( 'beats_player_atc_style', 'dropdown' ) === 'dropdown' ) : ?>
								<div class="cart-dropdown" id="cartdropdown">
									<div class="form-wrap">
										<div class="content">
											<?php
											echo edd_get_purchase_link(
												array(
													'download_id' => $download_id,
													'direct' => false,
													'text' => 'Add to cart',
													'style' => 'button',
												)
											);
											?>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<div id="beat_player_wrapper">
				<button class="btn-beats show-player"><i class="fas fa-chevron-up"></i></button>

				<div class="track-info">
					<div class="beat_thumb">
						<img src="" alt="">
					</div>

					<div class="track-content">
						<h4><?php echo esc_html__( 'Untitled', 'highnote' ); ?></h4>
						<p><span id="by"><?php echo esc_html__( 'Untitled', 'highnote' ); ?></span></p>
					</div>
				</div>

				<div id="beat_player">
					<div class="pl_controls">
						<button class="repeat-button" title="Repeat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0z" fill="none" />
								<path fill="#fff" id="repat-btn-path"
									d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z" />
							</svg>
						</button>

						<button class="shuffle-button" title="Shuffle">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0z" fill="none" />
								<path fill="#fff" id="shuffle-btn-path"
									d="M10.59 9.17L5.41 4 4 5.41l5.17 5.17 1.42-1.41zM14.5 4l2.04 2.04L4 18.59 5.41 20 17.96 7.46 20 9.5V4h-5.5zm.33 9.41l-1.41 1.41 3.13 3.13L14.5 20H20v-5.5l-2.04 2.04-3.13-3.13z" />
							</svg>
						</button>

						<button id="prev_btn">
							<i class="dashicons dashicons-controls-skipback"></i>
						</button>

						<button id="play_btn">
							<div class="loading">
								<div class="loading__spinner"></div>
							</div>
							<i class="dashicons dashicons-controls-play"></i>
						</button>

						<button id="next_btn">
							<i class="dashicons dashicons-controls-skipforward"></i>
						</button>
					</div>

					<div class="duration-range controls">
						<span id="currentDuration">0:00</span>
						<div class="controls__slider slider" data-direction="horizontal">
							<div class="controls__progress gap-progress bts-asset-bg">
								<div class="pin progress__pin bts-asset-bg" data-method="rewind"></div>
							</div>
						</div>
						<span id="totalTime">0:00</span>
					</div>
				</div>

				<div class="beats_elements">
					<div class="volume">
						<button class="mute-button" title="Mute">
							<svg width="20" height="16" viewBox="0 0 384 384" class="unmute">
								<path
									d="M288,192c0-37.653-21.76-70.187-53.333-85.867v171.84C266.24,262.187,288,229.653,288,192z" />
								<polygon points="0,128 0,256 85.333,256 192,362.667 192,21.333 85.333,128" />
								<path
									d="M234.667,4.907V48.96C296.32,67.307,341.333,124.373,341.333,192S296.32,316.693,234.667,335.04v44.053C320.107,359.68,384,283.413,384,192S320.107,24.32,234.667,4.907z" />
							</svg>

							<svg width="20" height="20" viewBox="0 0 24 24" class="mute">
								<path id="mute-path" fill="#fff"
									d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z" />
								<path d="M0 0h24v24H0z" fill="none" />
							</svg>
						</button>
						<div class="volume__controls">
							<div class="volume__slider slider" data-direction="horizontal">
								<div class="volume__progress gap-progress bts-asset-bg">
									<div class="pin volume__pin bts-asset-bg" data-method="changeVolume"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php } ?>
