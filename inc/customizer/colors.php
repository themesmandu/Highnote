<?php
/**
 * Additional color settings.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();

/**
 *
 * Add Section colors to nav_menu Panel
 */
Kirki::add_section(
	'nav_menu_colors',
	array(
		'title'    => __( 'Menu Color Settings', 'highnote' ),
		'panel'    => 'nav_menus',
		'priority' => 99,
	)
);

// menu bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_bar_bgcolor',
		'label'     => __( 'Main Menu Bar Background', 'highnote' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_bar_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.main-navigation',
				'property' => 'background-color',
			),
		),
	)
);

// menu fixed bg color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'color',
		'settings'    => 'menu_bar_scroll_bgcolor',
		'label'       => __( 'Main Menu Bar Background(fixed scroll)', 'highnote' ),
		'description' => __( 'Note: This is also background color for menu dropdown in small screen', 'highnote' ),
		'section'     => 'nav_menu_colors',
		'default'     => $defaults['menu_bar_scroll_bgcolor'],
		'choices'     => array(
			'alpha' => true,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.main-navigation.fixed, #navbarmenus.responsive',
				'property' => 'background-color',
			),
		),
	)
);

// menu color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_color',
		'label'     => __( 'Main Menu Text Color', 'highnote' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar .navbar-nav .nav-link, .menu-item-has-children:after, .menu-item-has-children .caret',
				'property' => 'color',
			),
			array(
				'element'  => '.navbar-expand-lg .navbar-nav .menu-item-has-children .sub-menu .nav-link, .main-navigation .sub-menu .menu-item-has-children .caret',
				'property' => 'color',
			),
			array(
				'element'  => '.main-navigation .menu-item.current-menu-item .nav-link:before',
				'property' => 'background-color',
			),
		),
	)
);

// menu hover color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_hover_color',
		'label'     => __( 'Main Menu Hover Color', 'highnote' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar .navbar-nav .nav-link:hover, .main-navigation .menu-item-has-children:hover:after',
				'property' => 'color',
			),
			array(
				'element'  => '.main-navigation .menu-item.current-menu-item .nav-link:hover:before',
				'property' => 'background-color',
			),
		),
	)
);

// site ttle color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'site_title_color',
		'label'     => __( 'Site Title Color', 'highnote' ),
		'section'   => 'title_tagline',
		'default'   => $defaults['site_title_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar .navbar-brand, .navbar .navbar-brand:hover',
				'property' => 'color',
			),
			array(
				'element'  => '.site-branding span',
				'property' => 'color',
			),
		),
	)
);

// body Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'body_color',
		'label'     => __( 'Theme Text Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['body_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'body',
				'property' => 'color',
			),
		),
	)
);

// page header title Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'header_title_color',
		'label'     => __( 'Page Header Title Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['header_title_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.page-content .header-title, .error404 .form-title',
				'property' => 'color',
			),
		),
	)
);

// Text Link Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'link_color',
		'label'     => __( 'Link Text Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['link_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'a',
				'property' => 'color',
			),

			array(
				'element'  => '.widget_tag_cloud a',
				'property' => 'border-color',
			),
		),
	)
);

// Text Link Hover Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'link_hover_color',
		'label'     => __( 'Link Text Hover Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['link_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'a:hover',
				'property' => 'color',
			),
		),
	)
);

// Button Background Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_btn_color',
		'label'     => __( 'Button Background Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['beats_btn_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button, .btn-beats, input[type="submit"], slick-arrow, .slick-active button',
				'property' => 'background-color',
			),
		),
	)
);

// Button Background: Hover Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_btn_hover_color',
		'label'     => __( 'Button Background: Hover Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['beats_btn_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button:hover, .btn-beats:hover, input[type="submit"]:hover, slick-arrow:hover',
				'property' => 'background-color',
			),
		),
	)
);

// Button Text Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_btn_text_color',
		'label'     => __( 'Button Text Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['beats_btn_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button, .btn-beats, input[type="submit"], slick-arrow',
				'property' => 'color',
			),
		),
	)
);

// Button Text: Hover Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'beats_btn_text_hover_color',
		'label'     => __( 'Button Text: Hover Color', 'highnote' ),
		'section'   => 'colors',
		'default'   => $defaults['beats_btn_text_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button:hover, .btn-beats:hover, input[type="submit"]:hover, slick-arrow:hover',
				'property' => 'color',
			),
		),
	)
);





