<?php
/**
 * Contact section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Contact to Panel
 */
Kirki::add_section(
	'frontpage_contact',
	array(
		'title'    => __( 'Contact Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 7,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_contact',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_contact .container',
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
		'settings' => 'contact_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_contact',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_contact',
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
		'settings'  => 'contact_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => $defaults['contact_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_contact .overlay',
				'property' => 'background',
			),
		),
	)
);

// Setting color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'contact_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_contact',
				'property' => 'color',
			),

			array(
				'element'  => 'section .wpcf7-form input, section .wpcf7-form textarea',
				'property' => 'border-color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'contact_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => array(
			'padding-top'    => '90px',
			'padding-right'  => '0px',
			'padding-bottom' => '90px',
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
				'element'  => '.section_contact',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.section_contact',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.section_contact',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.section_contact',
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
		'settings' => 'contact_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_contact',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_contact',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'contact_bs_spread',
					'section_shadow_color'  => 'contact_bs_color',
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
		'settings' => 'contact_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_contact',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_contact',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'contact_bs_color',
					'section_shadow_blur'  => 'contact_bs_blur',
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
		'settings' => 'contact_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_contact',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.section_contact',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'contact_bs_spread',
					'section_shadow_blur'   => 'contact_bs_blur',
				),
			),
		),
	)
);

// Setting section heading.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'contact_title',
		'label'    => esc_html__( 'Section Heading', 'highnote' ),
		'section'  => 'frontpage_contact',
	)
);

// Setting section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'contact_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_contact',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'contact_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_contact .section_header',
				'property' => 'text-align',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'contact_heading_width',
		'label'     => esc_html__( 'Heading Width(px)', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => 745,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_contact .section_header',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

// Setting Contact shortcode.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'contact_shortcode',
		'label'    => esc_html__( 'Contact Form 7 Shortcode', 'highnote' ),
		'section'  => 'frontpage_contact',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'contact_column_animation',
		'label'    => esc_html__( 'Column Animation', 'highnote' ),
		'section'  => 'frontpage_contact',
		'default'  => '',
		'choices'  => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
			'top'    => esc_html__( 'Top', 'highnote' ),
			'bottom' => esc_html__( 'Bottom', 'highnote' ),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'contact_column_animation_speed',
		'label'     => esc_html__( 'Column Animation Speed (Secs)', 'highnote' ),
		'section'   => 'frontpage_contact',
		'default'   => '',
		'choices'   => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '',
				'property'      => '',
				'value_pattern' => '',
			),
		),
	)
);
