<?php
/**
 * Beats Player section settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section Beats player to Panel
 */
Kirki::add_section(
	'frontpage_beats_player',
	array(
		'title'    => __( 'Beats Player Section', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 6,
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'container_width_player',
		'label'     => esc_html__( 'Section Container Width(px)', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => 1200,
		'choices'   => array(
			'min'  => 0,
			'max'  => 1900,
			'step' => 5,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.section_beats .container',
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
		'settings' => 'beats_player_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'width'    => 1920,
		'height'   => 1080,
		'output'   => array(
			array(
				'element'  => '.section_beats',
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
		'settings'  => 'beats_player_overlay',
		'label'     => __( 'Section Background Overlay', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.section_beats .overlay',
				'property' => 'background',
			),
		),
	)
);

// setting external beat store.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'code',
		'settings'    => 'beats_external_store',
		'label'       => esc_html__( 'External Store Code', 'highnote' ),
		'description' => esc_html__( 'Note: this setting will disable player and use external store', 'highnote' ),
		'section'     => 'frontpage_beats_player',
		'choices'     => array(
			'language' => 'html',
			'language' => 'css',
			'language' => 'js',
		),
	)
);


// setting player add to cart style
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'beats_player_atc_style',
		'label'    => esc_html__( 'Add To Cart: Style', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 'dropdown',
		'choices'  => array(
			'dropdown' => esc_html__( 'Dropdown', 'highnote' ),
			'popup'    => esc_html__( 'Pop Up', 'highnote' ),
		),
	)
);

// Setting toggle search.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'beats_player_search_toggle',
		'label'    => esc_html__( 'Show Search', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => '1',
	)
);

// Setting toggle cart.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'beats_player_cart_toggle',
		'label'    => esc_html__( 'Show Shoping Cart', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => '1',
	)
);

// Setting toggle filters.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'beats_player_filters_toggle',
		'label'    => esc_html__( 'Show Filters', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => '1',
	)
);

// Setting toggle donwload button.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[beats_player_download_toggle]',
		'label'    => esc_html__( 'Show Download Button', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => $defaults['beats_player_download_toggle'],
	)
);

// Setting toggle tags.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[beats_player_tag_column_toggle]',
		'label'    => esc_html__( 'Show Tags Column', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => $defaults['beats_player_tag_column_toggle'],
	)
);

// Setting toggle bpm.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'highnote_theme_options[beats_player_bpm_column_toggle]',
		'label'    => esc_html__( 'Show BPM Column', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => $defaults['beats_player_bpm_column_toggle'],
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'beats_player_padding',
		'label'     => esc_html__( 'Section Paddings', 'highnote' ),
		'section'   => 'frontpage_beats_player',
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
				'element'  => 'section.section_beats',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => 'section.section_beats',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => 'section.section_beats',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => 'section.section_beats',
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
		'settings' => 'beats_section_bs_blur',
		'label'    => esc_html__( 'Section Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_beats',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px section_shadow_spreadpx section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_spread' => 'beats_section_bs_spread',
					'section_shadow_color'  => 'beats_section_bs_color',
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
		'settings' => 'beats_section_bs_spread',
		'label'    => esc_html__( 'Section Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_beats',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_blurpx $px section_shadow_color',
				'pattern_replace' => array(
					'section_shadow_color' => 'beats_section_bs_color',
					'section_shadow_blur'  => 'beats_section_bs_blur',
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
		'settings' => 'beats_section_bs_color',
		'label'    => __( 'Section Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'section.section_beats',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px section_shadow_spreadpx section_shadow_blurpx $',
				'pattern_replace' => array(
					'section_shadow_spread' => 'beats_section_bs_spread',
					'section_shadow_blur'   => 'beats_section_bs_blur',
				),
			),
		),
	)
);


// player margins
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'beats_player_margin',
		'label'     => esc_html__( 'Beats Player Margins', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => array(
			'margin-top'    => '0px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'highnote' ),
				'margin-right'  => esc_html__( 'Margin Right', 'highnote' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'highnote' ),
				'margin-left'   => esc_html__( 'Margin Left', 'highnote' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'choice'   => 'margin-top',
				'element'  => 'section .beats_store',
				'property' => 'margin-top',
			),
			array(
				'choice'   => 'margin-right',
				'element'  => 'section .beats_store',
				'property' => 'margin-right',
			),
			array(
				'choice'   => 'margin-bottom',
				'element'  => 'section .beats_store',
				'property' => 'margin-bottom',
			),
			array(
				'choice'   => 'margin-left',
				'element'  => 'section .beats_store',
				'property' => 'margin-left',
			),
		),
	)
);


//player box shadow tob bottom
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'beats_player_bs_tb',
		'label'    => esc_html__( 'Player Box Shadow Top-Bottom(px)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.beats_store',
				'property'        => 'box-shadow',
				'value_pattern'   => '$px player_shadow_lrpx player_shadow_blurpx player_shadow_spreadpx player_shadow_color',
				'pattern_replace' => array(
					'player_shadow_lr'     => 'beats_player_bs_lr',
					'player_shadow_blur'   => 'beats_player_bs_blur',
					'player_shadow_spread' => 'beats_player_bs_spread',
					'player_shadow_color'  => 'beats_player_bs_color',
				),
			),
		),
	)
);

//player box shadow left right
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'beats_player_bs_lr',
		'label'    => esc_html__( 'Player Box Shadow Left-Right(px)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 0,
		'choices'  => array(
			'min'  => -50,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.beats_store',
				'property'        => 'box-shadow',
				'value_pattern'   => 'player_shadow_tbpx $px player_shadow_blurpx player_shadow_spreadpx player_shadow_color',
				'pattern_replace' => array(
					'player_shadow_tb'     => 'beats_player_bs_tb',
					'player_shadow_blur'   => 'beats_player_bs_blur',
					'player_shadow_spread' => 'beats_player_bs_spread',
					'player_shadow_color'  => 'beats_player_bs_color',
				),
			),
		),
	)
);

//player box shadow blur
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'beats_player_bs_blur',
		'label'    => esc_html__( 'Player Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 15,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.beats_store',
				'property'        => 'box-shadow',
				'value_pattern'   => 'player_shadow_tbpx player_shadow_lrpx $px player_shadow_spreadpx player_shadow_color',
				'pattern_replace' => array(
					'player_shadow_tb'     => 'beats_player_bs_tb',
					'player_shadow_lr'     => 'beats_player_bs_lr',
					'player_shadow_spread' => 'beats_player_bs_spread',
					'player_shadow_color'  => 'beats_player_bs_color',
				),
			),
		),
	)
);

//player box shadow spread
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'beats_player_bs_spread',
		'label'    => esc_html__( 'Player Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 8,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '.beats_store',
				'property'        => 'box-shadow',
				'value_pattern'   => 'player_shadow_tbpx player_shadow_lrpx player_shadow_blurpx $px player_shadow_color',
				'pattern_replace' => array(
					'player_shadow_tb'    => 'beats_player_bs_tb',
					'player_shadow_lr'    => 'beats_player_bs_lr',
					'player_shadow_blur'  => 'beats_player_bs_blur',
					'player_shadow_color' => 'beats_player_bs_color',
				),
			),
		),
	)
);

//player box shadow
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'beats_player_bs_color',
		'label'    => __( 'Player Box Shadow Color', 'highnote' ),
		'section'  => 'frontpage_beats_player',
		'default'  => 'rgba(0,0,0,.7)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '.beats_store',
				'property'        => 'box-shadow',
				'value_pattern'   => 'player_shadow_tbpx player_shadow_lrpx player_shadow_blurpx player_shadow_spreadpx $',
				'pattern_replace' => array(
					'player_shadow_tb'     => 'beats_player_bs_tb',
					'player_shadow_lr'     => 'beats_player_bs_lr',
					'player_shadow_blur'   => 'beats_player_bs_blur',
					'player_shadow_spread' => 'beats_player_bs_spread',
				),
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'number',
		'settings'  => 'beats_player__height',
		'label'     => esc_html__( 'Beats Player Height(px)', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => 500,
		'choices'   => array(
			'min'  => 0,
			'max'  => 2000,
			'step' => 10,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.beats_store .beats_table tbody',
				'property'      => 'max-height',
				'value_pattern' => '$px',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'custom',
		'settings' => 'beats_player_track_border_start',
		'section'  => 'frontpage_beats_player',
		'default'  => '<h2>Player Track Border Options</h2>',
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'beats_player_track_border_height',
		'label'     => esc_html__( 'Track Border Height(px)', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => 1,
		'choices'   => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => '.beats_table .track_lk',
				'property'      => 'border-top-width',
				'value_pattern' => '$px',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'select',
		'settings'    => 'beats_player_track_border_style',
		'label'       => esc_html__( 'Track Border Style', 'highnote' ),
		'section'     => 'frontpage_beats_player',
		'default'     => 'solid',
		'placeholder' => esc_html__( 'Select a style...', 'highnote' ),
		'choices'     => array(
			'solid'  => esc_html__( 'Solid', 'highnote' ),
			'dotted' => esc_html__( 'Dotted', 'highnote' ),
			'double' => esc_html__( 'Double', 'highnote' ),
			'groove' => esc_html__( 'Groove', 'highnote' ),
			'outset' => esc_html__( 'Outset', 'highnote' ),
			'ridge'  => esc_html__( 'Ridge', 'highnote' ),
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.beats_table .track_lk',
				'property' => 'border-top-style',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_track_border_color',
		'label'     => __( 'Track Border Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => '#1b1b1f',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_table .track_lk',
				'property' => 'border-top-color',
			),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'custom',
		'settings' => 'beats_player_color_start',
		'section'  => 'frontpage_beats_player',
		'default'  => '<h2>Beats Player Color Options</h2>',
	)
);

// player navbar bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_navbar_bg',
		'label'     => __( 'Navbar Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_navbar_bg'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar-beats',
				'property' => 'background-color',
			),
		),
	)
);

// player navbar text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_navbar_text_color',
		'label'     => __( 'Navbar Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_navbar_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar-beats',
				'property' => 'color',
			)
		),
	)
);

// player navbar button color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_navbar_btn_color',
		'label'     => __( 'Navbar Filter Button Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_navbar_btn_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.filters_list .list span, .filter_type ul li a',
				'property' => 'background-color',
			),
			array(
				'element'  => '.filters_list .list span',
				'property' => 'border-color',
			),
			array(
				'element'  => '.filters_list #hide_track span, .filters_list .list.sort_by span, .filters_list .filter_type i',
				'property' => 'color',
			),
			array(
				'element'  => '.filter_type ul::-webkit-scrollbar-track',
				'property' => 'background',
			),
		),
	)
);

// player navbar button text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_navbar_btn_text_color',
		'label'     => __( 'Navbar Filter Button Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_navbar_btn_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.filters_list .list, .beats_store .beats_cart.show .cart_content, .filter_type ul li a',
				'property' => 'color',
			),
			array(
				'element'  => '.filter_type ul::-webkit-scrollbar-thumb',
				'property' => 'background',
			),
		),
	)
);

// player bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_bg',
		'label'     => __( 'Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_bg'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .beats_table, .tracks-table .apear-cart .cart-dropdown',
				'property' => 'background-color',
			),
			array(
				'element'  => '.cart-dropdown .edd_download_purchase_form .edd_price_options label',
				'property' => 'background-color',
			),
		),
	)
);

// player text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_text_color',
		'label'     => __( 'Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store, .table.tracks-table, .cart-dropdown .edd_download_purchase_form .edd_price_options .edd_price_option_name',
				'property' => 'color',
			),
			array(
				'element'  => '.filters_list li a',
				'property' => 'color',
			),
		),
	)
);

// player button color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_btn_assets',
		'label'     => __( 'Button Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_btn_assets'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .btn-beats, .btn-beats.track-play-from-list .dashicons, .beats_store .btn-cart',
				'property' => 'background-color',
			),
			array(
				'element'  => '.cart-pop-up .edd_download_purchase_form .edd_price_options li.selected label, .cart-pop-up .edd_price_options label:hover',
				'property' => 'background-color',
			),
			array(
				'element'  => '.bts-asset-bg, .filter_type ul li a:hover',
				'property' => 'background-color',
			),
			array(
				'element'  => '#beat_player .pl_controls .shuffle-button.shuffled, 
				#beat_player .pl_controls .repeat-button.repeated',
				'property' => 'background-color',
			),
			array(
				'element'  => '.player_fixed #beat_player_wrapper',
				'property' => 'border-color',
			),
			array(
				'element'  => '.cart-pop-up .column h4, .beats_store .beats-span, .cart-pop-up td span.genre, .cart-pop-up td span.category',
				'property' => 'color',
			),
			array(
				'element'  => '.edd_download_purchase_form .edd_price_options span.edd_price_option_price',
				'property' => 'color',
			),
		),
	)
);

// player button text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_btn_text_color',
		'label'     => __( 'Button Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_btn_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .btn-beats, #beat_player .pl_controls button#play_btn i, .beats_store .btn-cart',
				'property' => 'color',
			),
			array(
				'element'  => '#play_btn .loading .loading__spinner',
				'property' => 'border-color',
			),
			array(
				'element'  => 'path.repeat, path.shuffle',
				'property' => 'fill',
			),
		),
	)
);

// player added button color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_btn_added',
		'label'     => __( 'Added Button Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_btn_added'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.tracks-table .btn-pop .edd_go_to_checkout:before, .tracks-table .btn-drop .edd_go_to_checkout:before',
				'property' => 'background-color',
			),
		),
	)
);

// player added button text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_btn_added_text_color',
		'label'     => __( 'Added Button Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_btn_added_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.tracks-table .btn-drop .edd_go_to_checkout:before',
				'property' => 'color',
			),
		),
	)
);

// player now playing bg.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_now_playing_bg',
		'label'     => __( 'Now Playing Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_now_playing_bg'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.bt_current_track',
				'property' => 'background-color',
			),
		),
	)
);

// player now playing text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'now_playing_text_color',
		'label'     => __( 'Now Playing Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['now_playing_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.bt_current_track',
				'property' => 'color',
			),
		),
	)
);

// player now playing button color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'now_playing_btn_color',
		'label'     => __( 'Now Playing Button Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['now_playing_btn_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .bt_current_track .btn-beats, .bt_current_track  .btn-beats.track-play-from-list .dashicons',
				'property' => 'background-color',
			),
		),
	)
);

// player now playing button text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'now_playing_btn_text_color',
		'label'     => __( 'Now Playing Button Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['now_playing_btn_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .bt_current_track .btn-beats, .bt_current_track .btn-beats.track-play-from-list .dashicons',
				'property' => 'color',
			),
		),
	)
);

// player shared bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_shared_bg_color',
		'label'     => __( 'Shared Beats Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_shared_bg_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.track_lk.shared_track',
				'property' => 'background-color',
			),
		),
	)
);

// player shared text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_shared_text_color',
		'label'     => __( 'Shared Beats Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_shared_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.track_lk.shared_track',
				'property' => 'color',
			),
		),
	)
);

// player shared button color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_shared_btn_color',
		'label'     => __( 'Shared Beats Button Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_shared_btn_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.track_lk.shared_track .play_track i, .track_lk.shared_track .price_btn',
				'property' => 'background-color',
			),
		),
	)
);

// player shared button text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_shared_btn_text_color',
		'label'     => __( 'Shared Beats Button Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_shared_btn_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.track_lk.shared_track .play_track i,.track_lk.shared_track .btn-beats.track-play-from-list .dashicons, .track_lk.shared_track .price_btn',
				'property' => 'color',
			),
		),
	)
);

// player Licensing area color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_licensing_area_color',
		'label'     => __( 'Licensing Area Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_licensing_area_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.cart-dropdown .edd_download_purchase_form .edd_price_options label, .cart-pop-up .edd_download_purchase_form .edd_price_options label',
				'property' => 'background-color',
			),
		),
	)
);

// player Licensing area text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_licensing_area_text_color',
		'label'     => __( 'Licensing Area Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_licensing_area_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.edd_download_purchase_form .edd_price_options span.edd_price_option_price, 
				.cart-dropdown .edd_download_purchase_form .edd_price_options .edd_price_option_name, .edd_download_purchase_form .edd_price_options .edd_price_option_name',
				'property' => 'color',
			),
		),
	)
);

// player Licensing area selected background color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_licensing_area_selected_bg_color',
		'label'     => __( 'Licensing Area Selected Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_licensing_area_selected_bg_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.cart-dropdown .edd_download_purchase_form .edd_price_options .selected label:before,
				.cart-pop-up .edd_download_purchase_form .edd_price_options .selected label:before, .cart-pop-up .edd_download_purchase_form .edd_price_options label:hover',
				'property' => 'background-color',
			),
		),
	)
);

// player Licensing area selected text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_licensing_area_selected_text_color',
		'label'     => __( 'Licensing Area Selected Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_licensing_area_selected_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.cart-dropdown .edd_download_purchase_form .edd_price_options .selected span.edd_price_option_price,
				.cart-dropdown .edd_download_purchase_form .edd_price_options li.selected span,
				.cart-pop-up .edd_download_purchase_form .edd_price_options li.selected span,
				.cart-pop-up .edd_download_purchase_form .edd_price_options label:hover span',
				'property' => 'color',
			),
		),
	)
);

// Player dynamic settings

// footer player background color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'footer_beats_player_bg',
		'label'     => __( 'Footer Player Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['footer_beats_player_bg'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#beat_player_wrapper.now_playing',
				'property' => 'background-color',
			),
		),
	)
);

// footer player text color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'footer_beats_player_text_color',
		'label'     => __( 'Footer Player Text Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['footer_beats_player_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#beat_player_wrapper.now_playing',
				'property' => 'color',
			),
			array(
				'element'  => '.mute-button polygon, .unmute path, path.muted, path.repeat, path.shuffle',
				'property' => 'fill',
			),
		),
	)
);


// player buffering & volume bar background color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_control_slider_bg_color',
		'label'     => __( 'Player & Volume Buffering Bar Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_control_slider_bg_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.controls .controls__slider, .volume .volume__controls .volume__slider',
				'property' => 'background-color',
			)
		),
	)
);

// player scroll bar track background color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_scrollbar_track_bg_color',
		'label'     => __( 'Player Scroll Bar Track Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_scrollbar_track_bg_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .beats_table tbody::-webkit-scrollbar-track',
				'property' => 'background',
			)
		),
	)
);

// player scroll bar thumb background color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_player_scrollbar_thumb_bg_color',
		'label'     => __( 'Player Scroll Bar Thumb Background Color', 'highnote' ),
		'section'   => 'frontpage_beats_player',
		'default'   => $defaults['beats_player_scrollbar_thumb_bg_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.beats_store .beats_table tbody::-webkit-scrollbar-thumb',
				'property' => 'background',
			)
		),
	)
);
