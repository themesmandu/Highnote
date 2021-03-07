<?php
/**
 * Typography slider and banner settings section.
 *
 * @package Highnote
 */

/**
 *
 * Add Section
 */
Kirki::add_section(
	'typography_slider_banner_options',
	array(
		'title' => __( 'Slider And Banner Headings', 'highnote' ),
		'panel' => 'typography_options',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_slider_banner',
		'label'     => esc_html__( 'Typography(Slider And Banner Headings)', 'highnote' ),
		'section'   => 'typography_slider_banner_options',
		'default'   => array(
			'font-family'    => '',
			'variant'        => 'regular',
			'font-size'      => '214px',
			'line-height'    => '1.3',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => 'header .beats-heading',
			),
		),
		'transport' => 'auto',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_slider_banner_tablet',
		'label'     => esc_html__( 'Typography(Slider And Banner Headings) Tablet', 'highnote' ),
		'section'   => 'typography_slider_banner_options',
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
		'settings'  => 'typography_slider_banner_mobile',
		'label'     => esc_html__( 'Typography(Slider And Banner Headings) Mobile', 'highnote' ),
		'section'   => 'typography_slider_banner_options',
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
		'settings'  => 'typography_slider_banner_subheading',
		'label'     => esc_html__( 'Typography(Slider And Banner Sub-Headings)', 'highnote' ),
		'section'   => 'typography_slider_banner_options',
		'default'   => array(
			'font-family'    => '',
			'variant'        => 'regular',
			'font-size'      => '214px',
			'line-height'    => '1.3',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => '.beats-sub-heading',
			),
		),
		'transport' => 'auto',

	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_slider_banner_subheading_tablet',
		'label'     => esc_html__( 'Typography(Slider And Banner Sub-Headings) Tablet', 'highnote' ),
		'section'   => 'typography_slider_banner_options',
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
		'settings'  => 'typography_slider_banner_subheading_mobile',
		'label'     => esc_html__( 'Typography(Slider And Banner Sub-Headings) Mobile', 'highnote' ),
		'section'   => 'typography_slider_banner_options',
		'default'   => array(
			'font-size'   => '',
			'line-height' => '',
		),
		'transport' => 'refresh',

	)
);
