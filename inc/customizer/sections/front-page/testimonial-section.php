<?php
/**
 * Testimonial section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Testimonial to Panel
 */
Kirki::add_section(
	'frontpage_testimonial',
	array(
		'title'    => __( 'Testimonial Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 12,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_testinomial',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_review .container',
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
		'settings' => 'testimonial_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_review',
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
		'settings'  => 'testimonial_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => $defaults['testimonial_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_review .overlay',
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
		'settings'  => 'tesimonial_section_color',
		'label'     => __( 'Section Text Color', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_review',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'testimonial_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_testimonial',
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
				'element'  => 'section.section_review',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => 'section.section_review',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => 'section.section_review',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => 'section.section_review',
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
		'settings' => 'testimonial_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_review',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'testimonial_bs_spread',
					'section_shadow_color'  => 'testimonial_bs_color',
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
		'settings' => 'testimonial_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_review',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'testimonial_bs_color',
					'section_shadow_blur'  => 'testimonial_bs_blur',
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
		'settings' => 'testimonial_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_review',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'testimonial_bs_spread',
					'section_shadow_blur'   => 'testimonial_bs_blur',
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
		'settings' => 'testimonial_title',
		'label'    => esc_html__( 'Section Heading', 'highnote' ),
		'section'  => 'frontpage_testimonial',
	)
);

// Setting section description.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'textarea',
		'settings' => 'testimonial_desc',
		'label'    => esc_html__( 'Section Description', 'highnote' ),
		'section'  => 'frontpage_testimonial',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'radio-buttonset',
		'settings'  => 'testimonial_heading_text_align',
		'label'     => esc_html__( 'Text Align (Heading)', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'highnote' ),
			'center' => esc_html__( 'Center', 'highnote' ),
			'right'  => esc_html__( 'Right', 'highnote' ),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_review .section_header',
				'property' => 'text-align',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'testimonial_heading_width',
		'label'     => esc_html__( 'Heading Width(px)', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => 570,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_review .section_header',
				'property'      => 'max-width',
				'value_pattern' => '$px',
			),
		),
	)
);

// testimonials
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'         => 'repeater',
		'label'        => esc_html__( 'Testimonials', 'highnote' ),
		'section'      => 'frontpage_testimonial',
		'row_label'    => array(
			'type'  => 'text',
			'value' => esc_html__( 'Testimonial', 'highnote' ),
		),
		'button_label' => esc_html__( 'Add New Testimonial', 'highnote' ),
		'settings'     => 'testimonials',
		'fields'       => array(
			'name'            => array(
				'type'  => 'text',
				'label' => esc_html__( 'Client Name', 'highnote' ),
			),
			'testimony'       => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Testimony', 'highnote' ),
			),
			'image'           => array(
				'type'  => 'image',
				'label' => esc_html__( 'Picture', 'highnote' ),
			),
			'companynamerank' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Company Name/Rank', 'highnote' ),
			),
		),
	)
);

//section # rows
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'select',
		'settings'    => 'highnote_theme_options[testimonial_rows]',
		'label'       => esc_html__( 'Testimonial Slides', 'highnote' ),
		'section'     => 'frontpage_testimonial',
		'default'     => $defaults['testimonial_rows'],
		'placeholder' => esc_html__( 'Select number of slides...', 'highnote' ),
		'choices'     => array(
			'1' => esc_html__( 'One', 'highnote' ),
			'2' => esc_html__( 'Two', 'highnote' ),
		),
	)
);

// Setting toggle slide navigation arrows.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'testimonial_slide_nav_arrows_toggle',
		'label'    => esc_html__( 'Show Slide Navigation Arrows', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => '0',
	)
);

// Setting toggle slide navigation dots.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'testimonial_slide_nav_dots_toggle',
		'label'    => esc_html__( 'Show Slide Navigation Dots', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => '0',
	)
);

// Setting toggle autoplay.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[testimonial_slide_autoplay_toggle]',
		'label'    => esc_html__( 'Slide Autoplay', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => '1',
	)
);

// Setting autoplay speed.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'highnote_theme_options[testimonial_slide_autoplay_speed]',
		'label'    => esc_html__( 'Slide Autoplay Speed (sec)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 3,
		'choices'  => array(
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		),
	)
);

// Setting autoplay speed.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'highnote_theme_options[testimonial_slide_speed]',
		'label'    => esc_html__( 'Slide Speed (milisecond)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 5,
		'choices'  => array(
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		),
	)
);



// Setting color odd.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'testimonial_odd_color',
		'label'     => __( 'Testimonial Odd Background Color', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => $defaults['testimonial_odd_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.testimonialslide .test_slide',
				'property' => 'background-color',
			),
		),
	)
);

//odd box shadow color
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'testimonial_odd_bs_color',
		'label'    => __( 'Testimonial Odd Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => $defaults['testimonial_odd_bs_color'],
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_odd_tbpx testimonial_odd_lrpx testimonial_odd_blurpx testimonial_odd_spreadpx $',
				'pattern_replace' => array(
					'testimonial_odd_tb'     => 'testimonial_odd_bs_tb',
					'testimonial_odd_lr'     => 'testimonial_odd_bs_lr',
					'testimonial_odd_blur'   => 'testimonial_odd_bs_blur',
					'testimonial_odd_spread' => 'testimonial_odd_bs_spread',
				),
			),
		),
	)
);

//odd box shadow top-bottom
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_odd_bs_tb',
		'label'    => esc_html__( 'Testimonial Odd Box Shadow Top-Bottom(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => '$px testimonial_odd_lrpx testimonial_odd_blurpx testimonial_odd_spreadpx testimonial_odd_color',
				'pattern_replace' => array(
					'testimonial_odd_lr'     => 'testimonial_odd_bs_lr',
					'testimonial_odd_blur'   => 'testimonial_odd_bs_blur',
					'testimonial_odd_spread' => 'testimonial_odd_bs_spread',
					'testimonial_odd_color'  => 'testimonial_odd_bs_color',
				),
			),
		),
	)
);

//odd box shadow left-right
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_odd_bs_lr',
		'label'    => esc_html__( 'Testimonial Odd Box Shadow Left-Right(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_odd_tbpx $px testimonial_odd_blurpx testimonial_odd_spreadpx testimonial_odd_color',
				'pattern_replace' => array(
					'testimonial_odd_tb'     => 'testimonial_odd_bs_tb',
					'testimonial_odd_blur'   => 'testimonial_odd_bs_blur',
					'testimonial_odd_spread' => 'testimonial_odd_bs_spread',
					'testimonial_odd_color'  => 'testimonial_odd_bs_color',
				),
			),
		),
	)
);

//odd box shadow blur
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_odd_bs_blur',
		'label'    => esc_html__( 'Testimonial Odd Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_odd_tbpx testimonial_odd_lrpx $px testimonial_odd_spreadpx testimonial_odd_color',
				'pattern_replace' => array(
					'testimonial_odd_tb'     => 'testimonial_odd_bs_tb',
					'testimonial_odd_lr'     => 'testimonial_odd_bs_lr',
					'testimonial_odd_spread' => 'testimonial_odd_bs_spread',
					'testimonial_odd_color'  => 'testimonial_odd_bs_color',
				),
			),
		),
	)
);

//odd box shadow spread
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_odd_bs_spread',
		'label'    => esc_html__( 'Testimonial Odd Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_odd_tbpx testimonial_odd_lrpx testimonial_odd_blurpx $px testimonial_odd_color',
				'pattern_replace' => array(
					'testimonial_odd_tb'    => 'testimonial_odd_bs_tb',
					'testimonial_odd_lr'    => 'testimonial_odd_bs_lr',
					'testimonial_odd_blur'  => 'testimonial_odd_bs_blur',
					'testimonial_odd_color' => 'testimonial_odd_bs_color',
				),
			),
		),
	)
);

// Setting color even.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'testimonial_even_color',
		'label'     => __( 'Testimonial Even Background Color', 'highnote' ),
		'section'   => 'frontpage_testimonial',
		'default'   => $defaults['testimonial_even_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.testimonialslide .slick-slide:nth-child(even) .test_slide',
				'property' => 'background-color',
			),
		),
	)
);

//even box shadow color
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'testimonial_even_bs_color',
		'label'    => __( 'Testimonial Even Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => $defaults['testimonial_even_bs_color'],
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .slick-slide:nth-child(even) .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_even_tbpx testimonial_even_lrpx testimonial_even_blurpx testimonial_even_spreadpx $',
				'pattern_replace' => array(
					'testimonial_even_tb'     => 'testimonial_even_bs_tb',
					'testimonial_even_lr'     => 'testimonial_even_bs_lr',
					'testimonial_even_blur'   => 'testimonial_even_bs_blur',
					'testimonial_even_spread' => 'testimonial_even_bs_spread',
				),
			),
		),
	)
);


//even box shadow top-bottom
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_even_bs_tb',
		'label'    => esc_html__( 'Testimonial Even Box Shadow Top-Bottom(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .slick-slide:nth-child(even) .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => '$px testimonial_even_lrpx testimonial_even_blurpx testimonial_even_spreadpx testimonial_even_color',
				'pattern_replace' => array(
					'testimonial_even_lr'     => 'testimonial_even_bs_lr',
					'testimonial_even_blur'   => 'testimonial_even_bs_blur',
					'testimonial_even_spread' => 'testimonial_even_bs_spread',
					'testimonial_even_color'  => 'testimonial_even_bs_color',
				),
			),
		),
	)
);

//even box shadow left-right
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_even_bs_lr',
		'label'    => esc_html__( 'Testimonial Even Box Shadow Left-Right(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .slick-slide:nth-child(even) .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_even_tbpx $px testimonial_even_blurpx testimonial_even_spreadpx testimonial_even_color',
				'pattern_replace' => array(
					'testimonial_even_tb'     => 'testimonial_even_bs_tb',
					'testimonial_even_blur'   => 'testimonial_even_bs_blur',
					'testimonial_even_spread' => 'testimonial_even_bs_spread',
					'testimonial_even_color'  => 'testimonial_even_bs_color',
				),
			),
		),
	)
);

//even box shadow blur
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_even_bs_blur',
		'label'    => esc_html__( 'Testimonial Even Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .slick-slide:nth-child(even) .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_even_tbpx testimonial_even_lrpx $px testimonial_even_spreadpx testimonial_even_color',
				'pattern_replace' => array(
					'testimonial_even_tb'     => 'testimonial_even_bs_tb',
					'testimonial_even_lr'     => 'testimonial_even_bs_lr',
					'testimonial_even_spread' => 'testimonial_even_bs_spread',
					'testimonial_even_color'  => 'testimonial_even_bs_color',
				),
			),
		),
	)
);

//even box shadow spread
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'testimonial_even_bs_spread',
		'label'    => esc_html__( 'Testimonial Even Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_testimonial',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.testimonialslide .slick-slide:nth-child(even) .test_slide',
				'property'        => 'box-shadow',
				'value_pattern'   => 'testimonial_even_tbpx testimonial_even_lrpx testimonial_even_blurpx $px testimonial_even_color',
				'pattern_replace' => array(
					'testimonial_even_tb'    => 'testimonial_even_bs_tb',
					'testimonial_even_lr'    => 'testimonial_even_bs_lr',
					'testimonial_even_blur'  => 'testimonial_even_bs_blur',
					'testimonial_even_color' => 'testimonial_even_bs_color',
				),
			),
		),
	)
);



// Setting custom css.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'toggle',
		'settings'    => 'testimonial_css',
		'label'       => esc_html__( 'Use Theme Custom Designs', 'highnote' ),
		'description' => esc_html__( 'Note: This option doesnot work visually on customizer preview. Please check front end after publishing', 'highnote' ),
		'section'     => 'frontpage_testimonial',
		'default'     => '1',
	)
);

