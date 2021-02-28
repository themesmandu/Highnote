<?php
/**
 * Beats Player section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Beats player to Panel
 */
Kirki::add_section(
	'frontpage_beats_player',
	array(
		'title'    => __( 'Beats Player Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 6,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_player',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_beats .container',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

// Setting background image
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'cropped_image',
		'settings' => 'beats_player_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_beats',
				'property' => 'background-image',
			),
		),
	)
);

// Setting gradient overlay.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_beats .overlay',
				'property' => 'background',
			),
		),
	)
);

// Setting player shortcode.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'highnote_player_shortcode',
		'label'    => esc_html__( 'Highnote Player Shortcode (highnote player plugin generated)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
	)
);


