<?php
/**
 * Post page settings section.
 *
 * @package Highnote
 */

$defaults = highnote_get_default_theme_options();
/**
 *
 * Add Section
 */
Kirki::add_section(
	'blog_options',
	array(
		'title'    => __( 'Posts Page Settings', 'highnote' ),
		'priority' => 170,
	)
);

// Settings.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'blog_pagination_mode',
		'label'    => esc_html__( 'Posts page navigation', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => 'numeric',
		'choices'  => array(
			'standard' => get_template_directory_uri() . '/assets/images/standard-pagination.png',
			'numeric'  => get_template_directory_uri() . '/assets/images/numeric-pagination.png',
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'text',
		'settings'    => 'more_link',
		'label'       => __( 'Read More button', 'highnote' ),
		'description' => __( 'Enter the button name which is a link to the full post. You can leave this blank if you want to hide the button.', 'highnote' ),
		'section'     => 'blog_options',
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'        => 'select',
		'settings'    => 'post_dropdown_setting',
		'label'       => esc_html__( 'Featured Post', 'highnote' ),
		'section'     => 'blog_options',
		'placeholder' => esc_html__( 'Select post...', 'highnote' ),
		'choices'     => Kirki_Helper::get_posts( array( 'post_type' => 'post' ) ),
	)
);

//post box shadow top-bottom
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'post_bs_tb',
		'label'    => esc_html__( 'Post Box Shadow Top-Bottom(px)', 'highnote' ),
		'section'  => 'blog_options',
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
					'shadow_lr'     => 'post_bs_lr',
					'shadow_blur'   => 'post_bs_blur',
					'shadow_spread' => 'post_bs_spread',
					'shadow_color'  => 'post_bs_color',
				),
			),
		),
	)
);

//post box shadow left-right
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'post_bs_lr',
		'label'    => esc_html__( 'Post Box Shadow Left-Right(px)', 'highnote' ),
		'section'  => 'blog_options',
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
					'shadow_tb'     => 'post_bs_tb',
					'shadow_blur'   => 'post_bs_blur',
					'shadow_spread' => 'post_bs_spread',
					'shadow_color'  => 'post_bs_color',
				),
			),
		),
	)
);

//post box shadow blur
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'post_bs_blur',
		'label'    => esc_html__( 'Post Box Shadow Blur(px)', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'article.post, article.page, .single-download article, .archive article.type-download',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx shadow_lrpx $px shadow_spreadpx shadow_color',
				'pattern_replace' => array(
					'shadow_tb'     => 'post_bs_tb',
					'shadow_lr'     => 'post_bs_lr',
					'shadow_spread' => 'post_bs_spread',
					'shadow_color'  => 'post_bs_color',
				),
			),
		),
	)
);

//post box shadow spread
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'post_bs_spread',
		'label'    => esc_html__( 'Post Box Shadow Spread(px)', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'article.post, article.page, .single-download article, .archive article.type-download',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx shadow_lrpx shadow_blurpx $px shadow_color',
				'pattern_replace' => array(
					'shadow_tb'    => 'post_bs_tb',
					'shadow_lr'    => 'post_bs_lr',
					'shadow_blur'  => 'post_bs_blur',
					'shadow_color' => 'post_bs_color',
				),
			),
		),
	)
);

//post box shadow color
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'post_bs_color',
		'label'    => __( 'Post Box Shadow Color', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => 'rgba(0,0,0,0)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'article.post, article.page, .single-download article, .archive article.type-download',
				'property'        => 'box-shadow',
				'value_pattern'   => 'shadow_tbpx shadow_lrpx shadow_blurpx shadow_spreadpx $',
				'pattern_replace' => array(
					'shadow_tb'     => 'post_bs_tb',
					'shadow_lr'     => 'post_bs_lr',
					'shadow_blur'   => 'post_bs_blur',
					'shadow_spread' => 'post_bs_spread',
				),
			),
		),
	)
);


Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'blog_layout',
		'label'    => esc_html__( 'Layout Style', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => 'standard',
		'choices'  => array(
			'standard' => get_template_directory_uri() . '/assets/images/blog-standard.png',
			'list'     => get_template_directory_uri() . '/assets/images/blog-list.png',
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'slider',
		'settings'  => 'article_padding',
		'label'     => esc_html__( 'Article Padding(px)', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => 20,
		'choices'   => array(
			'min'  => 0,
			'max'  => 60,
			'step' => 1,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'       => 'article .post-wrap',
				'property'      => 'padding',
				'value_pattern' => '$px',
			),
		),
	)
);

// sotarble content setting
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'highnote_theme_options[blog_sortable_content_sandard]',
		'label'    => esc_html__( 'Blog Content Layout(standard)', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => $defaults['blog_sortable_content_sandard'],
		'choices'  => array(
			'title'     => esc_html__( 'Title', 'highnote' ),
			'thumbnail' => esc_html__( 'Thumbnail', 'highnote' ),
			'meta'      => esc_html__( 'Meta', 'highnote' ),
			'content'   => esc_html__( 'Content', 'highnote' ),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'highnote_theme_options[blog_sortable_content_list]',
		'label'    => esc_html__( 'Blog Content Layout(list)', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => $defaults['blog_sortable_content_list'],
		'choices'  => array(
			'image'       => esc_html__( 'Image', 'highnote' ),
			'content-all' => esc_html__( 'Other Content', 'highnote' ),
		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'highnote_theme_options[blog_sortable_content_list2]',
		'label'    => esc_html__( 'Blog Content Layout(list meta)', 'highnote' ),
		'section'  => 'blog_options',
		'default'  => $defaults['blog_sortable_content_list2'],
		'choices'  => array(
			'title'   => esc_html__( 'Title', 'highnote' ),
			'meta'    => esc_html__( 'Meta', 'highnote' ),
			'content' => esc_html__( 'Content', 'highnote' ),

		),
	)
);

Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'post_heading_font_size',
		'label'     => esc_html__( 'Post Title Font Size', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => array(
			'font-size' => '',
		),
		'output'    => array(
			array(
				'element' => 'article .entry-title',
			),
		),
		'transport' => 'auto',

	)
);

// Blog Post Background.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'entry_bgcolor',
		'label'     => __( 'Blog Post Background', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => $defaults['entry_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'article.post, article.page, .single-post .navigation, #comments, #respond, .single-download article, .archive article.type-download',
				'property' => 'background-color',
			),
		),
	)
);

// Blog Post: Footer Background.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'entry_footer_bgcolor',
		'label'     => __( 'Blog Post: Footer Background', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => $defaults['entry_footer_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.card-footer',
				'property' => 'background-color',
			),
		),
	)
);

// Entry/Post/Page Title Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'title_color',
		'label'     => __( 'Entry/Post Title Text Color', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => $defaults['title_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.entry-title, .entry-title a, .page-title',
				'property' => 'color',
			),
		),
	)
);

// Entry/Post/Page Content Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'content_color',
		'label'     => __( 'Entry/Post/Page Content Text Color', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => $defaults['content_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'article.post,article.page, article.post p, article.page p, .single-post .navigation, #comments, #respond, .single-download article',
				'property' => 'color',
			),

			array(
				'element'  => 'input, textarea, select, .comment-respond input[type=text], .comment-respond input[type=email], .comment-respond .comment-form-comment textarea',
				'property' => 'border-color',
			),

		),
	)
);


// Meta Text Color.
Kirki::add_field(
	'highnote_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'meta_color',
		'label'     => __( 'Meta Text Color', 'highnote' ),
		'section'   => 'blog_options',
		'default'   => $defaults['meta_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.entry-footer, .entry-meta, .single-post .navigation .column',
				'property' => 'color',
			),
		),
	)
);
