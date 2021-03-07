<?php
/**
 * Offer section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Offer to Panel
 */
Kirki::add_section(
	'frontpage_offer',
	array(
		'title'    => __( 'Offer Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 10,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_offer',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_offer .container',
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
		'settings' => 'offer_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_offer',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_offer',
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
		'settings'  => 'offer_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '#040c2d',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer .overlay',
				'property' => 'background-color',
			),
		),
	)
);

// Setting color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'offer_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'offer_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_offer',
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
				'element'  => 'section_offer',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => 'section_offer',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => 'section_offer',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => 'section_offer',
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
		'settings' => 'offer_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section_offer',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'offer_bs_spread',
					'section_shadow_color'  => 'offer_bs_color',
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
		'settings' => 'offer_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section_offer',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'offer_bs_color',
					'section_shadow_blur'  => 'offer_bs_blur',
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
		'settings' => 'offer_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'section_offer',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'offer_bs_spread',
					'section_shadow_blur'   => 'offer_bs_blur',
				),
			),
		),
	)
);

// Setting section heading.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'              => 'text',
		'settings'          => 'offer_title',
		'label'             => esc_html__( 'Section Heading', 'highnote' ),
		'section'           => 'frontpage_offer',
		'sanitize_callback' => 'wp_kses_post',
	)
);

// Setting section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'offer_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_offer',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'offer_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer .section_header',
				'property' => 'text-align',
			),
		),
	)
);

// Setting sub-section heading.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'              => 'text',
		'settings'          => 'offer_sub_section_title',
		'label'             => esc_html__( 'Sub-section Heading', 'highnote' ),
		'section'           => 'frontpage_offer',
		'sanitize_callback' => 'wp_kses_post',
	)
);

// Setting sub-section sub-heading.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'              => 'text',
		'settings'          => 'offer_sub_section_sub_title',
		'label'             => esc_html__( 'Sub-section Sub-heading', 'highnote' ),
		'section'           => 'frontpage_offer',
		'sanitize_callback' => 'wp_kses_post',
	)
);

// Setting sub-section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'offer_sub_section_desc',
		'label'    => esc_html__( 'Sub-section Description', 'highnote' ),
		'section'  => 'frontpage_offer',
	)
);

// Setting button text.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'              => 'text',
		'settings'          => 'offer_ribbon_label',
		'label'             => esc_html__( 'Ribbon Label', 'highnote' ),
		'section'           => 'frontpage_offer',
		'sanitize_callback' => 'wp_kses_post',
	)
);

//sub section box top-bottom
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sub_offer_bs_tb',
		'label'    => esc_html__( 'Sub-section Box Shadow Top-Bottom(px)', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_offer .column-content',
				'property'        => 'box-shadow',
				'value_pattern'   => '$px subsection_lrpx subsection_blurpx subsection_spreadpx subsection_color',
				'pattern_replace' => array(
					'subsection_lr'     => 'sub_offer_bs_lr',
					'subsection_blur'   => 'sub_offer_bs_blur',
					'subsection_spread' => 'sub_offer_bs_spread',
					'subsection_color'  => 'sub_offer_bs_color',
				),
			),
		),
	)
);

//sub section box left-right
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sub_offer_bs_lr',
		'label'    => esc_html__( 'Sub-section Box Shadow Left-Right(px)', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_offer .column-content',
				'property'        => 'box-shadow',
				'value_pattern'   => 'subsection_tbpx $px subsection_blurpx subsection_spreadpx subsection_color',
				'pattern_replace' => array(
					'subsection_tb'     => 'sub_offer_bs_tb',
					'subsection_blur'   => 'sub_offer_bs_blur',
					'subsection_spread' => 'sub_offer_bs_spread',
					'subsection_color'  => 'sub_offer_bs_color',
				),
			),
		),
	)
);

//sub section box shadow blur
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sub_offer_bs_blur',
		'label'    => esc_html__( 'Sub-section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_offer .column-content',
				'property'        => 'box-shadow',
				'value_pattern'   => 'subsection_tbpx subsection_lrpx $px subsection_spreadpx subsection_color',
				'pattern_replace' => array(
					'subsection_tb'     => 'sub_offer_bs_tb',
					'subsection_lr'     => 'sub_offer_bs_lr',
					'subsection_spread' => 'sub_offer_bs_spread',
					'subsection_color'  => 'sub_offer_bs_color',
				),
			),
		),
	)
);

//sub section box shadow spread
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sub_offer_bs_spread',
		'label'    => esc_html__( 'Sub-Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_offer .column-content',
				'property'        => 'box-shadow',
				'value_pattern'   => 'subsection_tbpx subsection_lrpx subsection_blurpx $px subsection_color',
				'pattern_replace' => array(
					'subsection_tb'    => 'sub_offer_bs_tb',
					'subsection_lr'    => 'sub_offer_bs_lr',
					'subsection_blur'  => 'sub_offer_bs_blur',
					'subsection_color' => 'sub_offer_bs_color',
				),
			),
		),
	)
);

//sub section box shadow color
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'sub_offer_bs_color',
		'label'    => __( 'Sub-Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_offer',
		'default'  => '#000000',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.section_offer .column-content',
				'property'        => 'box-shadow',
				'value_pattern'   => 'subsection_tbpx subsection_lrpx subsection_blurpx subsection_spreadpx $',
				'pattern_replace' => array(
					'subsection_tb'     => 'sub_offer_bs_tb',
					'subsection_lr'     => 'sub_offer_bs_lr',
					'subsection_blur'   => 'sub_offer_bs_blur',
					'subsection_spread' => 'sub_offer_bs_spread',
				),
			),
		),
	)
);

// Setting sub section bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'offer_sub_section_bg_color',
		'label'     => __( 'Sub-Section Background color', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '#ba2c38',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer .column-content',
				'property' => 'background-color',
			),
		),
	)
);

// Setting sub section color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'offer_sub_section_color',
		'label'     => __( 'Sub-Section Text Color', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer .column-content',
				'property' => 'color',
			),
		),
	)
);

// Setting sub section ribbon bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'offer_sub_section_ribbon_bg_color',
		'label'     => __( 'Sub-Section Ribbon Background color', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '#161616',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer .ribbon',
				'property' => 'background-color',
			),
		),
	)
);

// Setting sub section ribbon color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'offer_sub_section_ribbon_color',
		'label'     => __( 'Sub-Section Ribbon Text Color', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_offer .ribbon',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'offer_column_one_animation',
		'label'    => esc_html__( 'Column One Animation', 'highnote' ),
		'section'  => 'frontpage_offer',
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
		'settings'  => 'offer_column_one_animation_speed',
		'label'     => esc_html__( 'Column One Animation Speed (Secs)', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '',
		'choices'   => array(
			'min'  => 0,
			'max'  => 5,
			'step' => 0.1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_offer .column:first-child',
				'property'      => 'animation-duration',
				'value_pattern' => '$s',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'offer_column_two_animation',
		'label'    => esc_html__( 'Column Two Animation', 'highnote' ),
		'section'  => 'frontpage_offer',
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
		'settings'  => 'offer_column_two_animation_speed',
		'label'     => esc_html__( 'Column Two Animation Speed (Secs)', 'highnote' ),
		'section'   => 'frontpage_offer',
		'default'   => '',
		'choices'   => array(
			'min'  => 0,
			'max'  => 5,
			'step' => 0.1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_offer .column:last-child',
				'property'      => 'animation-duration',
				'value_pattern' => '$s',
			),
		),
	)
);



