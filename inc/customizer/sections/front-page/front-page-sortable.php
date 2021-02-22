<?php
/**
 * Front page Sortable settings.
 *
 * @package Highnote
 */


/**
 *
 * Add Section About to Panel
 */
Kirki::add_section(
	'frontpage_sortable',
	array(
		'title'    => __( 'Front Page Section Order', 'highnote' ),
		'panel'    => 'frontpage_options',
		'priority' => 4,
	)
);

// sotarble content setting
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'front_page_sortable_section',
		'label'    => esc_html__( 'Front Page Sections Order', 'highnote' ),
		'section'  => 'frontpage_sortable',
		'choices'  => array(
			'offer'         => esc_html__( 'Offer Section', 'highnote' ),
			'beats-player'  => esc_html__( 'Beats Player Section', 'highnote' ),
			'features'      => esc_html__( 'Features Section', 'highnote' ),
			'pricing-table' => esc_html__( 'Pricing Table Section', 'highnote' ),
			'faqs'          => esc_html__( 'FAQs Section', 'highnote' ),
			'about'         => esc_html__( 'About Section', 'highnote' ),
			'testimonial'   => esc_html__( 'Testimonial Section', 'highnote' ),
			'contact'       => esc_html__( 'Contact Section', 'highnote' ),
		),
	)
);

