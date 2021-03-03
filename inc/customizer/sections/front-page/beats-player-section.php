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

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'beats_player_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote-player' ),
		'section'   => 'frontpage_beats_player',
		'default'   => array(
			'padding-top'    => '90px',
			'padding-right'  => '0px',
			'padding-bottom' => '90px',
			'padding-left'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'highnote-player' ),
				'padding-right'  => esc_html__( 'Padding Right', 'highnote-player' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'highnote-player' ),
				'padding-left'   => esc_html__( 'Padding Left', 'highnote-player' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'choice'   => 'padding-top',
				'element'  => '.section_beats',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.section_beats',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.section_beats',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.section_beats',
				'property' => 'padding-left',
			),
		),
	)
);

//section box shadow
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'beats_section_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote-player' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_beats',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'beats_section_bs_spread',
					'section_shadow_color'  => 'beats_section_bs_color',
				),
			),
		),
	)
);

//section box shadow
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'beats_section_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote-player' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_beats',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'beats_section_bs_color',
					'section_shadow_blur'  => 'beats_section_bs_blur',
				),
			),
		),
	)
);

//section box shadow
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'beats_section_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote-player' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.section_beats',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'beats_section_bs_spread',
					'section_shadow_blur'   => 'beats_section_bs_blur',
				),
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


// setting external beat store.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'code',
		'settings'    => 'beats_external_store',
		'label'       => esc_html__( 'External Store Code', 'beatsmandu' ),
		'description' => esc_html__( 'Note: this setting will disable player and use external store', 'beatsmandu' ),
		'section'     => 'frontpage_beats_player',
		'choices'     => array(
			'language' => 'html',
			'language' => 'css',
			'language' => 'js',
		),
	)
);


