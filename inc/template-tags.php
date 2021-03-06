<?php
/**
 * highnote Standalone Functions.
 *
 * Some of the functionality here could be replaced by core features.
 *
 * @package highnote
 */

if ( ! function_exists( 'highnote_entry_summary' ) ) :
	/**
	 *
	 * Template part which displays post excerpts on the posts page.
	 */
	function highnote_entry_summary() {

		global $post;
		$has_more = strpos( $post->post_content, '<!--more' );

		if ( $has_more ) {
			the_content();
		} else {
			the_excerpt();
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'highnote' ),
				'after'  => '</div>',
			)
		);
	}
endif;

if ( ! function_exists( 'highnote_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function highnote_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'highnote' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'highnote_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function highnote_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'highnote' ),
			'<span class="author vcard"><a class="url fn n bypostauthor" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'highnote_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function highnote_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'highnote' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'highnote' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'highnote' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'highnote' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'highnote' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'highnote' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'highnote_comment' ) ) :
	/**
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @param string $comment actual comment.
	 * @param string $args arguments.
	 * @param string $depth depth.
	 */
	function highnote_comment( $comment, $args, $depth ) {
		// Get correct tag used for the comments.
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		} ?>

<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
	id="comment-<?php comment_ID(); ?>">

		<?php
			// Switch between different comment types.
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
	<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'highnote' ); ?></span>
				<?php comment_author_link(); ?></div>
				<?php
				break;
			default:
				if ( 'div' !== $args['style'] ) {
					?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-meta">
			<?php } ?>
		<div class="comment-author vcard">
			<figure>
				<?php
						// Display avatar unless size is set to 0.
				if ( 0 !== $args['avatar_size'] ) {
					$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
					echo get_avatar( $comment, $avatar_size );
				}
				?>
			</figure>

			<div class="comment-metadata">
				<?php
						// Display author name.
						printf( __( '<span class="fn">%s</span> ', 'highnote' ), get_comment_author_link() );
				?>
				<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="date">
						<?php
							/* translators: 1: date, 2: time */
							printf(
								__( '%1$s at %2$s', 'highnote' ),
								get_comment_date(),
								get_comment_time()
							);
						?>
				</a>

				<div class="comment-details">
					<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
						<?php
							// Display comment moderation text.
						if ( '0' === $comment->comment_approved ) {
							?>
					<em
						class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'highnote' ); ?></em><br />
							<?php
						}
						?>

				</div><!-- .comment-details -->
					<?php
						edit_comment_link( __( '(Edit)', 'highnote' ), '  ', '' );
					?>
			</div><!-- .comment-meta -->
			<div class="reply">
					<?php
						// Display comment reply link.
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
								)
							)
						);
					?>
			</div>
		</div><!-- .comment-author -->
				<?php
				if ( 'div' !== $args['style'] ) {
					?>
	</div>
					<?php
				}
				// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us.
				break;
		endswitch; // End comment_type check.
	}
endif;


/**
 * Display the class for layout div wrapper.
 *
 * @param array $classes One or more classes to add to the class list.
 */
function highnote_layout_class( $classes = '' ) {
	// Separates classes with a single space.
	echo 'class="' . join( ' ', highnote_set_layout_class( $classes ) ) . '"'; // WPCS: XSS OK.
}

/**
 * Adds custom class.
 *
 * @param array $class Classes for the div element.
 * @return array
 */
function highnote_set_layout_class( $class = '' ) {

	// Define classes array.
	$classes = array();

	// Grid classes.
	if ( ( is_home() || is_archive() ) && ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = '';
	}

	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming.
	$classes = apply_filters( 'highnote_set_layout_class', $classes );

	// Classes array.
	return array_unique( $classes );
}

/**
 * Display the class for content wrapper div.
 *
 * @param array $classes One or more classes to add to the class list.
 */
function highnote_content_class( $classes = '' ) {
	// Separates classes with a single space.
	echo ' ' . join( ' ', highnote_set_content_class( $classes ) );// WPCS: XSS OK.
}

/**
 * Adds custom class.
 *
 * @param array $class Classes for the div element.
 * @return array
 */
function highnote_set_content_class( $class = '' ) {

	// Define classes array.
	$classes = array();

	$classes[] = 'col-lg-8 col-md-7';

	// Centered.
	if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_position' ) === 'none' ) {
		$classes[] = 'col-md-8 offset-md-2';
	}

	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming.
	$classes = apply_filters( 'highnote_set_content_class', $classes );

	// Classes array.
	return array_unique( $classes );
}

/**
 * Condition function.
 * This is a static front page and not the latest posts page.
 */
function highnote_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
