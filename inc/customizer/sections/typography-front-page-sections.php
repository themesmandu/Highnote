<?php
/**
 * Typography front page sections settings section.
 *
 * @package Highnote
 */

/**
 *
 * Add Section
 */
Kirki::add_section(
	'typography_front_page_options',
	array(
		'title' => __( 'Front Page Section Headings', 'highnote' ),
		'panel' => 'typography_options',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'front_page_section_headings',
		'label'     => esc_html__( 'Typography(Front Page Section Headings )', 'highnote' ),
		'section'   => 'typography_front_page_options',
		'default'   => array(
			'font-family'    => '',
			'variant'        => 'regular',
			'font-size'      => '130px',
			'line-height'    => '1.3',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => '.section-heading',
			),
		),
		'transport' => 'auto',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'front_page_section_headings_tablet',
		'label'     => esc_html__( 'Typography(Front Page Section Headings Tablet )', 'highnote' ),
		'section'   => 'typography_front_page_options',
		'default'   => array(
			'font-size'   => '',
			'line-height' => '',
		),
		'transport' => 'refresh',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'front_page_section_headings_mobile',
		'label'     => esc_html__( 'Typography(Front Page Section Headings Mobile )', 'highnote' ),
		'section'   => 'typography_front_page_options',
		'default'   => array(
			'font-size'   => '',
			'line-height' => '',
		),
		'transport' => 'refresh',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'front_page_section_subheadings',
		'label'     => esc_html__( 'Typography(Front Page Section Sub-Headings )', 'highnote' ),
		'section'   => 'typography_front_page_options',
		'default'   => array(
			'font-family'    => '',
			'variant'        => 'regular',
			'font-size'      => '130px',
			'line-height'    => '1.3',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => '.sec-description',
			),
		),
		'transport' => 'auto',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'front_page_section_subheadings_tablet',
		'label'     => esc_html__( 'Typography(Front Page Section Sub-Headings Tablet )', 'highnote' ),
		'section'   => 'typography_front_page_options',
		'default'   => array(
			'font-size'   => '',
			'line-height' => '',
		),
		'transport' => 'refresh',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'front_page_section_subheadings_mobile',
		'label'     => esc_html__( 'Typography(Front Page Section Sub-Headings Mobile )', 'highnote' ),
		'section'   => 'typography_front_page_options',
		'default'   => array(
			'font-size'   => '',
			'line-height' => '',
		),
		'transport' => 'refresh',

	)
);

