<?php
/**
 * Header background settings.
 *
 * @package Highnote
 */

/**
 *
 * Add Section
 */
Kirki::add_section(
	'header_background',
	array(
		'title'    => __( 'Header Background Image', 'highnote' ),
	)
);

// Setting background image global
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'global_header_bg',
		'label'    => esc_html__( 'Global Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);



// Setting background image blog
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'blog_header_bg',
		'label'    => esc_html__( 'Blog Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);

// Setting background image single
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'single_header_bg',
		'label'    => esc_html__( 'Single Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);


// Setting background image archive
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'archive_header_bg',
		'label'    => esc_html__( 'Archive Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);


// Setting background image search
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'search_header_bg',
		'label'    => esc_html__( 'Search Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);


// Setting background image page
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'page_header_bg',
		'label'    => esc_html__( 'Page Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);

// Setting background image 404
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => '404_header_bg',
		'label'    => esc_html__( '404 Header Background Image', 'highnote' ),
		'section'  => 'header_background',
	)
);
