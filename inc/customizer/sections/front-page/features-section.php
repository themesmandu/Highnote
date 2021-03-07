<?php
/**
 * Features section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Beats player to Panel
 */
Kirki::add_section(
	'frontpage_features',
	array(
		'title'    => __( 'Features Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 9,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_features',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_features .container',
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
		'settings' => 'features_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_features',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_features',
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
		'settings'  => 'features_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => $defaults['features_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_features .overlay',
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
		'settings'  => 'features_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_features',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'features_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_features',
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
				'element'  => '.section_features',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.section_features',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.section_features',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.section_features',
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
		'settings' => 'features_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_features',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_features',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'features_bs_spread',
					'section_shadow_color'  => 'features_bs_color',
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
		'settings' => 'features_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_features',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.section_features',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'features_bs_color',
					'section_shadow_blur'  => 'features_bs_blur',
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
		'settings' => 'features_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_features',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.section_features',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'features_bs_spread',
					'section_shadow_blur'   => 'features_bs_blur',
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
		'settings' => 'feature_title',
		'label'    => esc_html__( 'Section Heading', 'highnote' ),
		'section'  => 'frontpage_features',
	)
);

// Setting section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'feature_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_features',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'feature_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => 'center',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_features .section_header',
				'property' => 'text-align',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'feature_heading_width',
		'label'     => esc_html__( 'Heading Width(px)', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => 570,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_features .section_header',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

// Feature highlight color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'feature_highlight_color',
		'label'     => __( 'Features Highlight Color', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => $defaults['feature_highlight_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_features .column.selected .column-content',
				'property' => 'border-color',
			),
			array(
				'element'  => '.section_features .column.selected:before, .section_features .column.selected:after',
				'property' => 'background-color',
			),
			array(
				'element'  => '.section_features .column.selected .column-content:before, .section_features .column.selected .column-content:after',
				'property' => 'background-color',
			),
			array(
				'element'  => '.section_features .selected .column-content',
				'property' => 'color',
			),
		),
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'         => 'repeater',
		'label'        => esc_html__( 'Features', 'highnote' ),
		'section'      => 'frontpage_features',
		'row_label'    => array(
			'type'  => 'text',
			'value' => esc_html__( 'Feature', 'highnote' ),
		),
		'button_label' => esc_html__( 'Add New Feature', 'highnote' ),
		'settings'     => 'front_features',
		'fields'       => array(
			'feature_title'                  => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Feature Title', 'highnote' ),
			),
			'feature_icon'                   => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Feature Icon', 'highnote' ),
				'description' => esc_html__( 'Font Awesome icons. Ex: fas fa-ad ', 'highnote' ) . ' <a href="https://fontawesome.com/v5.14.0/icons/" target="_blank"><strong>' . esc_html__( 'View All', 'highnote' ) . ' </strong></a>',

			),
			'feature_subtitle'               => array(
				'type'  => 'text',
				'label' => esc_html__( 'Feature Sub-Title', 'highnote' ),
			),
			'feature_description'            => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Feature Description', 'highnote' ),
			),
			'feature_highlight'              => array(
				'type'  => 'checkbox',
				'label' => esc_html__( 'Highlight This Feature', 'highnote' ),
			),
			'feature_column_animation'       => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Column Animation', 'highnote' ),
				'default' => '',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'highnote' ),
					'right'  => esc_html__( 'Right', 'highnote' ),
					'top'    => esc_html__( 'Top', 'highnote' ),
					'bottom' => esc_html__( 'Bottom', 'highnote' ),
				),
			),
			'feature_column_animation_speed' => array(
				'type'    => 'number',
				'label'   => esc_html__( 'Column Animation Speed (secs)', 'highnote' ),
				'default' => '',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'feature_column_padding',
		'label'     => esc_html__( 'Feature Column Padding(px)', 'highnote' ),
		'section'   => 'frontpage_features',
		'default'   => 42,
		'choices'   => array(
			'min'  => 0,
			'max'  => 60,
			'step' => 1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_features .column-content',
				'property'      => 'padding',
				'value_pattern' => '$px',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[feature_show_icon]',
		'label'    => esc_html__( 'Show Icon', 'highnote' ),
		'section'  => 'frontpage_features',
		'default'  => $defaults['feature_show_icon'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[feature_show_icon_tablet]',
		'label'    => esc_html__( 'Show Icon Tablet View', 'highnote' ),
		'section'  => 'frontpage_features',
		'default'  => $defaults['feature_show_icon_tablet'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[feature_show_icon_mobile]',
		'label'    => esc_html__( 'Show Icon Mobile View', 'highnote' ),
		'section'  => 'frontpage_features',
		'default'  => $defaults['feature_show_icon_mobile'],
	)
);

