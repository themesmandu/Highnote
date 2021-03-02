<?php
/**
 * Helper functions.
 *
 * @package Highnote
 */


if ( ! function_exists( 'highnote_get_theme_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function highnote_get_theme_option( $key = '' ) {

		$default_options = highnote_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array) get_theme_mod( 'highnote_theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;
	}

endif;


if ( ! function_exists( 'highnote_header_page_title' ) ) :

	/**
	 * Display page title on header.
	 *
	 * @since 1.0.0
	 */
	function highnote_header_page_title() {
		if ( class_exists( 'woocommerce' ) ) {
			if ( is_front_page() ) :
				return;
			elseif ( is_home() || is_singular() && ! is_product() ) :
				?>
	<div class="page-content">
		<div class="container">
			<h1 class="header-title"><?php single_post_title(); ?></h1>
		</div>
	</div>
				<?php
			elseif ( is_home() || is_singular() && is_product() ) :
				?>
	<div class="page-content">
	</div>
				<?php
			elseif ( is_archive() && ! is_shop() ) :
				?>
	<div class="page-content">
		<div class="container">
			<h1 class="header-title"><?php the_archive_title(); ?></h1>
		</div>
	</div>
				<?php
			elseif ( is_archive() && is_shop() ) :
				?>
	<div class="page-content">
		<div class="container">
			<h1 class="header-title"><?php woocommerce_page_title(); ?></h1>
		</div>
	</div>
				<?php
			elseif ( is_search() ) :
				?>
	<div class="page-content">
		<div class="container">
			<h1 class="header-title">
				<?php /* translators: %s: search query. */ ?>
				<?php printf( esc_html__( 'Search Results for: %s', 'highnote' ), get_search_query() ); ?></h1>
		</div>
	</div>
				<?php
			elseif ( is_404() ) :
				?>
	<div class="page-content">
		<div class="container">
			<h1 class="header-title">
				<span><?php echo __( 'Oops!', 'highnote' ); ?></span><?php echo esc_html__( ' That page can&#39;t be found.', 'highnote' ); ?>
			</h1>
	
			<div class="error-404 not-found">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
				<?php
			endif;
		} else {
			if ( is_front_page() ) :
				return;
		elseif ( is_home() || is_singular() ) :
			?>
<div class="page-content">
	<div class="container">
		<h1 class="header-title"><?php single_post_title(); ?></h1>
	</div>
</div>
			<?php
		elseif ( is_archive() ) :
			?>
<div class="page-content">
	<div class="container">
		<h1 class="header-title"><?php the_archive_title(); ?></h1>
	</div>
</div>
			<?php
		elseif ( is_search() ) :
			?>
<div class="page-content">
	<div class="container">
			<?php /* translators: %s: search query. */ ?>
		<h1 class="header-title">
			<?php printf( esc_html__( 'Search Results for: %s', 'highnote' ), get_search_query() ); ?></h1>
	</div>
</div>
			<?php
		elseif ( is_404() ) :
			?>
<div class="page-content">
	<div class="container">
		<h1 class="header-title">
			<span><?php echo __( 'Oops!', 'highnote' ); ?></span><?php echo esc_html__( ' That page can&#39;t be found.', 'highnote' ); ?>
		</h1>

		<div class="error-404 not-found">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
			<?php
		endif;
		}
	}

endif;

/**
 * Add extra items in menu
 *
 * @since 1.0.0
 *
 * @param array $items item to b added.
 * @param object $args args object.
 */

function highnote_add_menu_item( $items, $args ) {
	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		if ( 'primary' === $args->theme_location ) {
			ob_start();
			the_widget( 'edd_cart_widget' );
			$widget = ob_get_clean();
			$items .= '<li class="beats_cart menu-item">
		<button class="btn-cart btn-beats">
			<p><i class="fas fa-shopping-cart"></i> 
			<span class="cart-count edd-cart-quantity">' . edd_get_cart_quantity() . '</span> Beats</p>
		</button>

		<div class="cart_content">
			<div class="cart-wrap">' . $widget . '</div>
		</div>
	</li>';

		}
	}
	return $items;
}
if ( get_theme_mod( 'mainmenu_cart_toggle', true ) ) {
	add_filter( 'wp_nav_menu_items', 'highnote_add_menu_item', 10, 2 );
}
