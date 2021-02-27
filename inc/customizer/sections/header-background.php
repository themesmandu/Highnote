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

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'header_background_padding',
		'label'     => esc_html__( 'Paddings', 'highnote' ),
		'section'   => 'header_background',
		'default'   => array(
			'padding-top'    => '155px',
			'padding-right'  => '0px',
			'padding-bottom' => '50px',
			'padding-left'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'highnote' ),
				'padding-right'  => esc_html__( 'Padding Right', 'highnote' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'highnote' ),
				'padding-left'   => esc_html__( 'Padding Left', 'highnote' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'choice'   => 'padding-top',
				'element'  => '#top-header .page-content',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '#top-header .page-content',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '#top-header .page-content',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '#top-header .page-content',
				'property' => 'padding-left',
			),
		),
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
