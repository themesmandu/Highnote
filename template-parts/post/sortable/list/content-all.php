<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Highnote
 */

?>
<?php $highnote_list_sortables = highnote_get_theme_option( 'blog_sortable_content_list' ); ?>
<div class="col-md-<?php echo ( ( has_post_thumbnail() && in_array( 'image', $highnote_list_sortables, true ) ) ? '8' : '12' ); ?>">
	<div class="column">

		<?php
		$highnote_list2_sortables = highnote_get_theme_option( 'blog_sortable_content_list2' );
		foreach ( $highnote_list2_sortables as $highnote_list2_sortable ) {
			get_template_part( 'template-parts/post/sortable/list/' . $highnote_list2_sortable );
		}
		?>
	</div>
</div>
