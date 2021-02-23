<?php
/**
 * Pricing Table section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Pricing Table to Panel
 */
Kirki::add_section(
	'frontpage_pricing_table',
	array(
		'title'    => __( 'Pricing Table Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 11,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_pricing_table',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_three .container',
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
		'settings' => 'pricing_table_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_pricing_table',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_three',
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
		'settings'  => 'pricing_table_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => $defaults['pricing_table_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_three .overlay',
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
		'settings'  => 'pricing_table_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_licensing',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'pricing_table_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
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
				'element'  => 'section.section_three',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => 'section.section_three',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => 'section.section_three',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => 'section.section_three',
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
		'settings' => 'pricing_table_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_pricing_table',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_three',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'pricing_table_bs_spread',
					'section_shadow_color'  => 'pricing_table_bs_color',
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
		'settings' => 'pricing_table_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_pricing_table',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_three',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'pricing_table_bs_color',
					'section_shadow_blur'  => 'pricing_table_bs_blur',
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
		'settings' => 'pricing_table_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_pricing_table',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_three',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'pricing_table_bs_spread',
					'section_shadow_blur'   => 'pricing_table_bs_blur',
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
		'settings' => 'pricing_table_title',
		'label'    => esc_html__( 'Section Heading', 'highnote' ),
		'section'  => 'frontpage_pricing_table',
	)
);

// Setting section description
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'pricing_table_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_pricing_table',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'pricing_table_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_licensing .section_header',
				'property' => 'text-align',
			),
		),
	)
);

// pricing table one
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'         => 'repeater',
		'label'        => esc_html__( 'Pricing Table One', 'highnote' ),
		'section'      => 'frontpage_pricing_table',
		'row_label'    => array(
			'type'  => 'text',
			'value' => esc_html__( 'Table', 'highnote' ),
		),
		'button_label' => esc_html__( 'Add New Table', 'highnote' ),
		'settings'     => 'pricing_tables',
		'fields'       => array(
			'table_title'             => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'highnote' ),
			),
			'table_subtitle'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Sub-Title', 'highnote' ),
			),
			'table_currency'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Currency', 'highnote' ),
			),
			'table_currency_position' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Currency Position', 'highnote' ),
				'default' => 'First',
				'choices' => array(
					'first' => esc_html__( 'First', 'highnote' ),
					'last'  => esc_html__( 'Last', 'highnote' ),
				),
			),
			'table_price'             => array(
				'type'  => 'number',
				'label' => esc_html__( 'Price', 'highnote' ),
			),
			'table_features'          => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Features', 'highnote' ),
			),
			'table_highlight'         => array(
				'type'  => 'checkbox',
				'label' => esc_html__( 'Highlight Table', 'highnote' ),
			),
		),
	)
);

// pricing table two
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'         => 'repeater',
		'label'        => esc_html__( 'Pricing Table Two', 'highnote' ),
		'section'      => 'frontpage_pricing_table',
		'row_label'    => array(
			'type'  => 'text',
			'value' => esc_html__( 'Table', 'highnote' ),
		),
		'button_label' => esc_html__( 'Add New Table', 'highnote' ),
		'settings'     => 'pricing_tables_two',
		'fields'       => array(
			'table_title'             => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'highnote' ),
			),
			'table_subtitle'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Sub-Title', 'highnote' ),
			),
			'table_currency'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Currency', 'highnote' ),
			),
			'table_currency_position' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Currency Position', 'highnote' ),
				'default' => 'First',
				'choices' => array(
					'first' => esc_html__( 'First', 'highnote' ),
					'last'  => esc_html__( 'Last', 'highnote' ),
				),
			),
			'table_price'             => array(
				'type'  => 'number',
				'label' => esc_html__( 'Price', 'highnote' ),
			),
			'table_button_label'      => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Label', 'highnote' ),
			),
			'table_button_link'       => array(
				'type'  => 'url',
				'label' => esc_html__( 'Button link', 'highnote' ),
			),
			'table_features'          => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Features', 'highnote' ),
			),
		),
	)
);

// Setting pricing table shortcode.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'text',
		'settings'    => 'pricing_table_shortcode',
		'label'       => esc_html__( 'Pricing Table Shortcode', 'highnote' ),
		'description' => esc_html__( 'for responsive pricing table plugin if needed( will disable above table)', 'highnote' ),
		'section'     => 'frontpage_pricing_table',
	)
);

// Setting custom css.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'toggle',
		'settings'    => 'pricing_table_css',
		'label'       => esc_html__( 'Use Theme Custom Designs', 'highnote' ),
		'description' => esc_html__( 'This setting overrides responsive pricing table plugin css. Note: This option doesnot work visually on customizer preview. Please check front end after publishing', 'highnote' ),
		'section'     => 'frontpage_pricing_table',
		'default'     => '1',
	)
);

// lisencing border color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_border_color',
		'label'     => __( 'Licensing One Border Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => $defaults['licensing_border_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.rpt_plan .column-content',
				'property' => 'border-color',
			),
			array(
				'element'  => '.rpt_plan:before, .rpt_plan:after, .rpt_plan .column-content:before, .rpt_plan .column-content::after',
				'property' => 'background-color',
			),
			array(
				'element'  => '.section_licensing .col-wrap:before, .section_licensing .col-wrap:after, .section_licensing .col-content:before, .section_licensing .col-content:after',
				'property' => 'background-color',
			),
			array(
				'element'  => '.section_licensing .col-content',
				'property' => 'border-color',
			),
		),
	)
);

// lisencing regular bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_regular_bg_color',
		'label'     => __( 'Licensing One Regular Background Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => '',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.rpt_plan .column-content',
				'property' => 'background-color',
			),
			array(
				'element'  => '.section_licensing .col-content',
				'property' => 'background-color',
			),
		),
	)
);

// lisencing regular text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_reggular_text_color',
		'label'     => __( 'Licensing One Regular Text Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.rpt_plan .column-content',
				'property' => 'color',
			),
			array(
				'element'  => '.section_licensing .col-content',
				'property' => 'color',
			),
		),
	)
);

// lisencing highlight bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_highlight_bg_color',
		'label'     => __( 'Licensing One Highlight Background Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => $defaults['licensing_highlight_bg_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.rpt_recommended_plan .column-content',
				'property' => 'border-color',
			),
			array(
				'element'  => '.rpt_recommended_plan .column-content, .rpt_recommended_plan:before, .rpt_recommended_plan:after, .rpt_recommended_plan .column-content:before, .rpt_recommended_plan .column-content:after',
				'property' => 'background-color',
			),
			array(
				'element'  => '.rpt_style_basic .rpt_plan.rpt_recommended_plan .rpt_head .rpt_price .rpt_currency',
				'property' => 'color',
			),

			array(
				'element'  => '.section_licensing .col-wrap.highlighted .col-content',
				'property' => 'border-color',
			),
			array(
				'element'  => '.section_licensing .col-wrap.highlighted .col-content, .section_licensing .col-wrap.highlighted:before, .section_licensing .col-wrap.highlighted:after, 
				.section_licensing .highlighted .col-content:before, .section_licensing .highlighted .col-content:after',
				'property' => 'background-color',
			),
		),
	)
);

// lisencing highlight text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_highlight_text_color',
		'label'     => __( 'Licensing One Highlight Text Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => $defaults['licensing_highlight_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.rpt_recommended_plan .column-content',
				'property' => 'color',
			),
			array(
				'element'  => '.section_licensing .col-wrap.highlighted .col-content',
				'property' => 'color',
			),
		),
	)
);


// lisencing two bg color .
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_two_bg_color',
		'label'     => __( 'Licensing Two Background Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => '#f05152',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_licensing .custom_beat_row .column-wrap',
				'property' => 'background-color',
			),
		),
	)
);

// lisencing two bg color features .
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_two_header_bg_color',
		'label'     => __( 'Licensing Two Header Background Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => '#ba2c38',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_licensing .custom_beat_row .header-wrap',
				'property' => 'background-color',
			),
		),
	)
);

// lisencing two text color .
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'licensing_two_text_color',
		'label'     => __( 'Licensing Two Text Color', 'highnote' ),
		'section'   => 'frontpage_pricing_table',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_licensing .custom_beat_row .column-wrap',
				'property' => 'color',
			),
		),
	)
);
