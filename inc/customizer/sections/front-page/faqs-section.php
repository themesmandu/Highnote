<?php
/**
 * FAQS section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section FAQS to Panel
 */
Kirki::add_section(
	'frontpage_faqs',
	array(
		'title'    => __( 'FAQS Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 8,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_faqs',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_faqs .container',
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
		'settings' => 'faqs_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_faqs',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_faqs',
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
		'settings'  => 'faqs_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => $defaults['faqs_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_faqs .overlay',
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
		'settings'  => 'faqs_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_faqs',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'faqs_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_faqs',
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
				'element'  => '.section_faqs',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.section_faqs',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.section_faqs',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.section_faqs',
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
		'settings' => 'faqs_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_faqs',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_faqs',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'faqs_bs_spread',
					'section_shadow_color'  => 'faqs_bs_color',
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
		'settings' => 'faqs_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_faqs',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_faqs',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'faqs_bs_color',
					'section_shadow_blur'  => 'faqs_bs_blur',
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
		'settings' => 'faqs_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_faqs',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.section_faqs',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'faqs_bs_spread',
					'section_shadow_blur'   => 'faqs_bs_blur',
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
		'settings' => 'faqs_title',
		'label'    => esc_html__( 'Section Heading', 'highnote' ),
		'section'  => 'frontpage_faqs',
	)
);

// Setting section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'faqs_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_faqs',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'faqs_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_four .section_header',
				'property' => 'text-align',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'faqs_heading_width',
		'label'     => esc_html__( 'Heading Width(px)', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => 930,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_four .section_header',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

// faqs position
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'faqs_position',
		'label'     => esc_html__( 'Faqs Position', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => '0 0 0 auto',
		'choices'   => array(
			'0 auto 0 0' => esc_html__( 'Left', 'highnote' ),
			'0 auto'     => esc_html__( 'Center', 'highnote' ),
			'0 0 0 auto' => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'choice'   => '0 auto 0 0',
				'element'  => '.section_faqs .column',
				'property' => 'margin',
			),
			array(
				'choice'   => '0 auto',
				'element'  => '.section_faqs .column',
				'property' => 'margin',
			),
			array(
				'choice'   => '0 0 0 auto',
				'element'  => '.section_faqs .column',
				'property' => 'margin',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'faqs_column',
		'label'    => esc_html__( 'Faqs Columns', 'highnote' ),
		'section'  => 'frontpage_faqs',
		'default'  => 'one',
		'choices'  => array(
			'one' => esc_html__( 'One', 'highnote' ),
			'two' => esc_html__( 'Two', 'highnote' ),
		),
	)
);

// Setting faqs active color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'faqs_active_color',
		'label'     => __( 'Faqs Active color', 'highnote' ),
		'section'   => 'frontpage_faqs',
		'default'   => $defaults['faqs_active_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_faqs .accordion-item.active .accordion-button',
				'property' => 'background-color',
			),

			array(
				'element'  => '.section_faqs .accordion-item.active .paragraph',
				'property' => 'border-color',
			),
		),
	)
);



// faqs
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'         => 'repeater',
		'label'        => esc_html__( 'FAQs', 'highnote' ),
		'section'      => 'frontpage_faqs',
		'row_label'    => array(
			'type'  => 'text',
			'value' => esc_html__( 'FAQ', 'highnote' ),
		),
		'button_label' => esc_html__( 'Add New FAQ', 'highnote' ),
		'settings'     => 'front_faqs',
		'fields'       => array(
			'faq_question' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Question', 'highnote' ),
			),
			'faq_answer'   => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Answer', 'highnote' ),
			),
			'faqs_expand'  => array(
				'type'  => 'checkbox',
				'label' => esc_html__( 'Expand Question', 'highnote' ),
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'faqs_column_animation',
		'label'    => esc_html__( 'Column Animation', 'highnote' ),
		'section'  => 'frontpage_faqs',
		'default'  => '',
		'choices'  => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
			'top'    => esc_html__( 'Top', 'highnote' ),
			'bottom' => esc_html__( 'Bottom', 'highnote' ),
		),
	)
);
