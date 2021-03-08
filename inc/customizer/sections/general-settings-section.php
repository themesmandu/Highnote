<?php
/**
 * General settings section.
 *
 * @package Highnote
 */


/**
 *
 * Add Section
 */
Kirki::add_section(
	'general_options',
	array(
		'title' => __( 'General Settings', 'highnote' ),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'slider',
		'settings'    => 'container_width_main',
		'label'       => esc_html__( 'Container Width(px)', 'highnote' ),
		'description' => esc_html__( 'Note: Front page sections have this option under their respective settings', 'highnote' ),
		'section'     => 'general_options',
		'default'     => 1200,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'       => '.container',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'mainmenu_cart_toggle',
		'label'    => esc_html__( 'Show Shopping Cart', 'highnote' ),
		'section'  => 'general_options',
		'default'  => '0',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'skip_to_content_toggle',
		'label'    => esc_html__( 'Show Skip To Content', 'highnote' ),
		'section'  => 'general_options',
		'default'  => '0',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'menubar_absolute',
		'label'    => esc_html__( 'Main Menu Bar Above Content', 'highnote' ),
		'section'  => 'general_options',
		'default'  => '0',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'link_underline',
		'label'    => esc_html__( 'Underline Links While Hover', 'highnote' ),
		'section'  => 'general_options',
		'default'  => '0',
	)
);



Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'menubar_mode',
		'label'    => esc_html__( 'Main Menu Bar Mode', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 'standard',
		'choices'  => array(
			'standard' => esc_html__( 'Without Search', 'highnote' ),
			'alt'      => esc_html__( 'With Search', 'highnote' ),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'mainmenu_style',
		'label'    => esc_html__( 'Main Menu: Style (On Scroll)', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 'regular',
		'choices'  => array(
			'regular' => esc_html__( 'Regular', 'highnote' ),
			'fixed'   => esc_html__( 'Fixed', 'highnote' ),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'mainmenu_dropdown_mode',
		'label'    => esc_html__( 'Main Menu: Appearance(small screen)', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 'default',
		'choices'  => array(
			'default'   => get_template_directory_uri() . '/assets/images/menu-left.png',
			'bootstrap' => get_template_directory_uri() . '/assets/images/menu-top.png',
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'sidebar_position',
		'label'    => esc_html__( 'Sidebar Displays', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 'right',
		'choices'  => array(
			'left'  => get_template_directory_uri() . '/assets/images/sidebar-left.png',
			'none'  => get_template_directory_uri() . '/assets/images/sidebar-none.png',
			'right' => get_template_directory_uri() . '/assets/images/sidebar-right.png',
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[sidebar_hide_tablet]',
		'label'    => esc_html__( 'Hide Sidebar Tablet View', 'highnote' ),
		'section'  => 'general_options',
		'default'  => $defaults['sidebar_hide_tablet'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[sidebar_hide_mobile]',
		'label'    => esc_html__( 'Hide Sidebar Mobile View', 'highnote' ),
		'section'  => 'general_options',
		'default'  => $defaults['sidebar_hide_mobile'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'sidebar_padding',
		'label'     => esc_html__( 'Sidebar Padding(px)', 'highnote' ),
		'section'   => 'general_options',
		'default'   => 20,
		'choices'   => array(
			'min'  => 0,
			'max'  => 60,
			'step' => 1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '#sidebar .sidebar',
				'property'      => 'padding',
				'value_pattern' => '$px',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'sidebar_heading_font_size',
		'label'     => esc_html__( 'Widget Title Font Size', 'highnote' ),
		'section'   => 'general_options',
		'default'   => array(
			'font-size' => '24px',
		),
		'output'    => array(
			array(
				'element' => '#sidebar .widget-title',
			),
		),
		'transport' => 'auto',

	)
);

// Setting sidebar bg.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'sidebar_bg',
		'label'     => __( 'Sidebar Background Color', 'highnote' ),
		'section'   => 'general_options',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#sidebar .sidebar',
				'property' => 'background-color',
			),
			array(
				'element'  => '.widget.widget_calendar table th, .widget.widget_calendar table #today, .widget.widget_calendar table td.pad',
				'property' => 'color',
			),
		),
	)
);

// Setting sidebar color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'sidebar_color',
		'label'     => __( 'Sidebar Text Color', 'highnote' ),
		'section'   => 'general_options',
		'default'   => '#020407',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#sidebar .sidebar',
				'property' => 'color',
			),
			array(
				'element'  => '.widget.widget_calendar table th, .widget.widget_calendar table #today, .widget.widget_calendar table td.pad',
				'property' => 'background-color',
			),
			array(
				'element'  => '.widget.widget_calendar table th, .widget.widget_calendar table #today, .widget.widget_calendar table td.pad',
				'property' => 'border-color',
			),
		),
	)
);

//sidebar box shadow top-bottom
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sidebar_bs_tb',
		'label'    => esc_html__( 'Sidebar Box Shadow Top-Bottom(px)', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'article.post, article.page, .single-download article, .archive article.type-download',
				'property'        => 'box-shadow',
				'value_pattern'   => '$px shadow_lrpx shadow_blurpx shadow_spreadpx shadow_color',
				'pattern_replace' => array(
					'shadow_lr'     => 'sidebar_bs_lr',
					'shadow_blur'   => 'sidebar_bs_blur',
					'shadow_spread' => 'sidebar_bs_spread',
					'shadow_color'  => 'sidebar_bs_color',
				),
			),
		),
	)
);

//sidebar box shadow left-right
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sidebar_bs_lr',
		'label'    => esc_html__( 'Sidebar Box Shadow Left-Right(px)', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'article.post, article.page, .single-download article, .archive article.type-download',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx $px shadow_blurpx shadow_spreadpx shadow_color',
				'pattern_replace' => array(
					'shadow_tb'     => 'sidebar_bs_tb',
					'shadow_blur'   => 'sidebar_bs_blur',
					'shadow_spread' => 'sidebar_bs_spread',
					'shadow_color'  => 'sidebar_bs_color',
				),
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sidebar_bs_blur',
		'label'    => esc_html__( 'Sidebar Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '#sidebar .sidebar',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx shadow_lrpx $px shadow_spreadpx shadow_color',
				'pattern_replace' => array(
					'shadow_tb'     => 'sidebar_bs_tb',
					'shadow_lr'     => 'sidebar_bs_lr',
					'shadow_spread' => 'sidebar_bs_spread',
					'shadow_color'  => 'sidebar_bs_color',
				),
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sidebar_bs_spread',
		'label'    => esc_html__( 'Sidebar Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '#sidebar .sidebar',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx shadow_lrpx shadow_blurpx $px shadow_color',
				'pattern_replace' => array(
					'shadow_tb'    => 'sidebar_bs_tb',
					'shadow_lr'    => 'sidebar_bs_lr',
					'shadow_color' => 'sidebar_bs_color',
					'shadow_blur'  => 'sidebar_bs_blur',
				),
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'sidebar_bs_color',
		'label'    => __( 'Sidebar Box Shadow Color', 'highnote' ),
		'section'  => 'general_options',
		'default'  => 'rgba(0,0,0,0)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '#sidebar .sidebar',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx shadow_lrpx shadow_spreadpx shadow_blurpx $',
				'pattern_replace' => array(
					'shadow_tb'     => 'sidebar_bs_tb',
					'shadow_lr'     => 'sidebar_bs_lr',
					'shadow_spread' => 'sidebar_bs_spread',
					'shadow_blur'   => 'sidebar_bs_blur',
				),
			),
		),
	)
);

