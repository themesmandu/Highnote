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
				'element' => '.beats-heading',
			),
		),
		'transport' => 'auto',

	)
);
