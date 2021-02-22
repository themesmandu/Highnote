<?php

/**
 *
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package highnote
 */

get_header();


$highnote_front_page_sortables = get_theme_mod( 'front_page_sortable_section' );
if ( $highnote_front_page_sortables ) {
	foreach ( $highnote_front_page_sortables as $highnote_front_page_sortable ) {
		get_template_part( 'template-parts/frontpage-sections/' . $highnote_front_page_sortable );
	}
}

get_footer();
