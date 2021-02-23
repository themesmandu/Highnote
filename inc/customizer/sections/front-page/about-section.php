<?php
/**
 * About section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section About to Panel
 */
Kirki::add_section(
	'frontpage_about',
	array(
		'title'    => __( 'About Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 5,
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_about',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_about',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_about .container',
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
		'settings' => 'about_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_about',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_about',
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
		'settings'  => 'about_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_about',
		'default'   => $defaults['about_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_about .overlay',
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
		'settings'  => 'about_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_about',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_about',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'about_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_about',
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
				'element'  => 'section.section_about',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => 'section.section_about',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => 'section.section_about',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => 'section.section_about',
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
		'settings' => 'about_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_about',
		'default'  => 10,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_about',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'about_bs_spread',
					'section_shadow_color'  => 'about_bs_color',
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
		'settings' => 'about_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_about',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_about',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'about_bs_color',
					'section_shadow_blur'  => 'about_bs_blur',
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
		'settings' => 'about_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_about',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_about',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'about_bs_spread',
					'section_shadow_blur'   => 'about_bs_blur',
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
		'settings' => 'about_title',
		'label'    => esc_html__( 'Section Heading', 'highnote' ),
		'section'  => 'frontpage_about',
	)
);

// Setting section heading.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'about_sub_title',
		'label'    => esc_html__( 'Section Sub-Heading', 'highnote' ),
		'section'  => 'frontpage_about',
	)
);

// Setting section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'about_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_about',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'about_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_about',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_about .section_header',
				'property' => 'text-align',
			),
		),
	)
);

// Setting featured image
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'about_featured_img',
		'label'    => esc_html__( 'Section Featured Image', 'highnote' ),
		'section'  => 'frontpage_about',
	)
);

// Setting button text.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'about_button_label',
		'label'    => esc_html__( 'Button Label', 'highnote' ),
		'section'  => 'frontpage_about',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'url',
		'settings' => 'about_button_link',
		'label'    => esc_html__( 'Button link', 'highnote' ),
		'section'  => 'frontpage_about',
	)
);


