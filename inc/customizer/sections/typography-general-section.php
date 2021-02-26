<?php
/**
 * Typography general settings section.
 *
 * @package Highnote
 */

/**
 *
 * Add Section
 */
Kirki::add_section(
	'typography_general_options',
	array(
		'title' => __( 'General', 'highnote' ),
		'panel' => 'typography_options',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_general',
		'label'     => esc_html__( 'Typography(body)', 'highnote' ),
		'section'   => 'typography_general_options',
		'default'   => array(
			'font-family'    => 'Nunito',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => 'body',
			),
		),
		'transport' => 'auto',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_general_tablet',
		'label'     => esc_html__( 'Typography(body) Tablet', 'highnote' ),
		'section'   => 'typography_general_options',
		'default'   => array(
			'font-size'   => '16px',
			'line-height' => '1.5',
		),
		'transport' => 'refresh',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_general_mobile',
		'label'     => esc_html__( 'Typography(body) Mobile', 'highnote' ),
		'section'   => 'typography_general_options',
		'default'   => array(
			'font-size'   => '16px',
			'line-height' => '1.5',
		),
		'output'    => array(
			array(
				'element' => 'body',
			),
		),
		'transport' => 'auto',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_paragraph',
		'label'     => esc_html__( 'Typography(paragraph)', 'highnote' ),
		'section'   => 'typography_general_options',
		'default'   => array(
			'font-family'    => 'Nunito',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => 'p',
			),
		),
		'transport' => 'auto',

	)
);
