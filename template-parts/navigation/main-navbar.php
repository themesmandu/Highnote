<?php

/**
 * Template part for displaying main navigation top-bar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package highnote
 */

?>
<?php if ( get_theme_mod( 'mainmenu_dropdown_mode' ) !== 'bootstrap' ) { ?>

	<nav class="navbar navbar-expand-lg main-navigation appear-left<?php echo esc_attr( ( get_theme_mod( 'menubar_absolute' ) ) ? ' above-navbar' : '' ); ?>">
	<?php } else { ?>
		<nav class="navbar navbar-expand-lg main-navigation<?php echo esc_attr( ( get_theme_mod( 'menubar_absolute' ) ) ? ' above-navbar' : '' ); ?>">
		<?php } ?>
		<div class="container">
			<?php if ( ! has_custom_logo() ) { ?>

				<?php if ( is_front_page() && is_home() ) : ?>

					<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

				<?php else : ?>

					<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

				<?php endif; ?>


				<?php
			} else {
				the_custom_logo();
			}
			?>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<div class="navbar-toggler-icon">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>


			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container'       => 'div',
					'container_id'    => 'navbarmenus',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_id'         => false,
					'depth'           => 8,
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => 'highnote_WP_Bootstrap_Navwalker::fallback',
				)
			);
			?>

		</div>
		</nav>
