<?php
/**
 * Head banner section settings.
 *
 * @package Highnote
 */


/**
 *
 * Add Section
 */
Kirki::add_section(
	'frontpage_banner',
	array(
		'title' => __( 'Header Banner Settings', 'highnote' ),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'banner_toggle',
		'label'    => esc_html__( 'Show Header Banner', 'highnote' ),
		'section'  => 'frontpage_banner',
		'default'  => '0',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_title',
		'label'    => esc_html__( 'Heading', 'highnote' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_subtitle',
		'label'    => esc_html__( 'Sub-Heading', 'highnote' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_button_label',
		'label'    => esc_html__( 'Button Label', 'highnote' ),
		'section'  => 'frontpage_banner',
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'link',
		'settings' => 'banner_button_link',
		'label'    => __( 'Button Link', 'highnote' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'banner_bg_color',
		'label'     => __( 'Background Color', 'highnote' ),
		'section'   => 'frontpage_banner',
		'default'   => '#ffffff',
		'transport' => 'auto',
		'choices'   => array(
			'alpha' => true,
		),
		'output'    => array(
			array(
				'element'  => '.front-page .jumbotron',
				'property' => 'background-color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'banner_color',
		'label'     => __( 'Text Color', 'highnote' ),
		'section'   => 'frontpage_banner',
		'default'   => '#ffffff',
		'transport' => 'auto',
		'choices'   => array(
			'alpha' => true,
		),
		'output'    => array(
			array(
				'element'  => '.front-page .jumbotron',
				'property' => 'color',
			),
		),
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'cropped_image',
		'settings' => 'banner_bg_image',
		'label'    => esc_html__( 'Background Image', 'highnote' ),
		'section'  => 'frontpage_banner',
		'width'    => 1900,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.front-page .jumbotron',
				'property' => 'background-image',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'banner_padding',
		'label'     => esc_html__( 'Banner Paddings', 'highnote' ),
		'section'   => 'frontpage_banner',
		'default'   => array(
			'padding-top'    => '350px',
			'padding-right'  => '0px',
			'padding-bottom' => '350px',
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
				'element'  => '.front-page .jumbotron',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.front-page .jumbotron',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.front-page .jumbotron',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.front-page .jumbotron',
				'property' => 'padding-left',
			),
		),
	)
);

