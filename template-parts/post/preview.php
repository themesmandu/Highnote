<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Highnote
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrap">
		<?php
		$highnote_standard_sortables = highnote_get_theme_option( 'blog_sortable_content_sandard' );
		foreach ( $highnote_standard_sortables as $highnote_standard_sortable ) {
			get_template_part( 'template-parts/post/sortable/standard/' . $highnote_standard_sortable );
		}
		?>
	</div>

	<?php if ( get_post_type() === 'post' ) { ?>

	<footer class="entry-footer">
		<?php highnote_entry_footer(); ?>
	</footer>


		<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
