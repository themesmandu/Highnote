<?php
/**
 * Footer settings section.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'footer_options',
	array(
		'title' => __( 'Footer Settings', 'highnote' ),
	)
);

// Setting background image
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'footer_bg',
		'label'    => esc_html__( 'Footer Background Image', 'highnote' ),
		'section'  => 'footer_options',
		'output'   => array(
			array(
				'element'  => '#footer',
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
		'settings'  => 'footer_overlay',
		'label'     => esc_html__( 'Footer Background Overlay', 'highnote' ),
		'section'   => 'footer_options',
		'default'   => $defaults['footer_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#footer .overlay',
				'property' => 'background',
			),
			array(
				'element'  => '#footer .widget.widget_calendar table th, #footer .widget.widget_calendar table #today, #footer .widget.widget_calendar table td.pad',
				'property' => 'color',
			),
		),
	)
);

// Footer Text Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'footer_color',
		'label'     => __( 'Footer Text Color', 'highnote' ),
		'section'   => 'footer_options',
		'default'   => $defaults['footer_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#footer',
				'property' => 'color',
			),
			array(
				'element'  => '#footer .widget.widget_calendar table th, #footer .widget.widget_calendar table #today, #footer .widget.widget_calendar table td.pad',
				'property' => 'background-color',
			),
			array(
				'element'  => '#footer .widget.widget_calendar table th, #footer .widget.widget_calendar table #today, #footer .widget.widget_calendar table td.pad',
				'property' => 'border-color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'footer_heading_font_size',
		'label'     => esc_html__( 'Footer Widget Title Font Size', 'highnote' ),
		'section'   => 'footer_options',
		'default'   => array(
			'font-size' => '24px',
		),
		'output'    => array(
			array(
				'element' => '#footer .widget-title',
			),
		),
		'transport' => 'auto',

	)
);




// Setting heading.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'text',
		'settings'    => 'footer_title',
		'label'       => __( 'Footer Heading', 'highnote' ),
		'description' => __( 'Note: If left empty site title will appear.', 'highnote' ),
		'section'     => 'footer_options',
	)
);

// Setting copyright.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'editor',
		'settings' => 'footer_copyright',
		'label'    => __( 'Copyright Text', 'highnote' ),
		'section'  => 'footer_options',
		'default'  => '',
	)
);