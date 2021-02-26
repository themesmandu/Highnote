<?php
/**
 * Head slider section settings.
 *
 * @package Highnote
 */


$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'frontpage_slider',
	array(
		'title' => __( 'Header Slider Settings', 'highnote' ),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'slider_toggle',
		'label'    => esc_html__( 'Show Header Slider', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => '1',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_slider',
		'label'     => esc_html__( 'Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_slider',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.container.slider-title-wrapper',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'slider_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_slider',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.container.slider-title-wrapper',
				'property' => 'text-align',
			),
		),
	)
);

// Setting color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'header_slider_color',
		'label'     => __( 'Text Color', 'highnote' ),
		'section'   => 'frontpage_slider',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.slider-title',
				'property' => 'color',
			),
		),
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'multicheck',
		'settings' => 'highnote_theme_options[slider_animations]',
		'label'    => esc_html__( 'Slider Animations', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slider_animations'],
		'choices'  => array(
			'turn'      => esc_html__( 'Turn', 'highnote' ),
			'shift'     => esc_html__( 'Shift', 'highnote' ),
			'louvers'   => esc_html__( 'Louvers', 'highnote' ),
			'cube_over' => esc_html__( 'Cube Over', 'highnote' ),
			'parallax'  => esc_html__( 'Parallex', 'highnote' ),
			'brick'     => esc_html__( 'Brick', 'highnote' ),
			'collage'   => esc_html__( 'Collage', 'highnote' ),
			'kenburns'  => esc_html__( 'Kenburns', 'highnote' ),
			'cube'      => esc_html__( 'Cube', 'highnote' ),
			'blur'      => esc_html__( 'Blur', 'highnote' ),
			'book'      => esc_html__( 'Book', 'highnote' ),
			'rotate'    => esc_html__( 'Rotate', 'highnote' ),
			'domino'    => esc_html__( 'Domino', 'highnote' ),
			'slices'    => esc_html__( 'Slices', 'highnote' ),
			'blast'     => esc_html__( 'Blast', 'highnote' ),
			'linear'    => esc_html__( 'Basic', 'highnote' ),
			'fade'      => esc_html__( 'Fade', 'highnote' ),
			'fly'       => esc_html__( 'Fly', 'highnote' ),
			'flip'      => esc_html__( 'Flip', 'highnote' ),
			'page'      => esc_html__( 'Page', 'highnote' ),
			'stack'     => esc_html__( 'Stack', 'highnote' ),

		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'highnote_theme_options[slide_duration]',
		'label'    => esc_html__( 'Slide Duration(secs)', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_duration'],
		'choices'  => array(
			'min'  => 1,
			'max'  => 9,
			'step' => 1,
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'highnote_theme_options[slide_delay]',
		'label'    => esc_html__( 'Slide Delay(secs)', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_delay'],
		'choices'  => array(
			'min'  => 1,
			'max'  => 9,
			'step' => 1,
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_autoplay]',
		'label'    => esc_html__( 'Slider Autoplay(on page load)', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_autoplay'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_pauseplay]',
		'label'    => esc_html__( 'Show Play/Pause Button', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => false,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_hover]',
		'label'    => esc_html__( 'Stop on Hover', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_hover'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_loop]',
		'label'    => esc_html__( 'Repeat Slides', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_loop'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_caption]',
		'label'    => esc_html__( 'Slider Caption', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_caption'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_control]',
		'label'    => esc_html__( 'Slider Navigation(next/prev button)', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_control'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_bullet]',
		'label'    => esc_html__( 'Slider Bullets(1,2,3...)', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_bullet'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[slide_gesture]',
		'label'    => esc_html__( 'Slider Gesture Control', 'highnote' ),
		'section'  => 'frontpage_slider',
		'default'  => $defaults['slide_gesture'],
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'         => 'repeater',
		'label'        => esc_html__( 'Slider Contents', 'highnote' ),
		'section'      => 'frontpage_slider',
		'row_label'    => array(
			'type'  => 'text',
			'value' => esc_html__( 'Slide', 'highnote' ),
		),
		'button_label' => esc_html__( 'Add New Slide', 'highnote' ),
		'settings'     => 'slider_contents',
		'fields'       => array(
			'slider_img'         => array(
				'type'   => 'cropped_image',
				'label'  => esc_html__( 'Image', 'highnote' ),
				'width'  => 1920,
				'height' => 1050,
			),
			'slider_heading'     => array(
				'type'  => 'text',
				'label' => esc_html__( 'Heading', 'highnote' ),
			),
			'slider_subheading'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Sub-heading/Description', 'highnote' ),
			),
			'slider_button_text' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Text', 'highnote' ),
			),
			'slider_button_link' => array(
				'type'  => 'url',
				'label' => esc_html__( 'Button Link', 'highnote' ),
			),
		),
	)
);

