<?php

/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Highnote
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('list-view'); ?>>
	<div class="post-wrap">
		<div class="row">
			<?php
			$highnote_list_sortables = highnote_get_theme_option('blog_sortable_content_list');
			foreach ($highnote_list_sortables as $highnote_list_sortable) {
				get_template_part('template-parts/post/sortable/list/' . $highnote_list_sortable);
			}
			?>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->