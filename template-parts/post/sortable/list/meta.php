<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Highnote
 */


if ( get_post_type() === 'post' ) {
	?>
	<div class="entry-meta">
	<?php highnote_posted_on(); ?>
		<?php highnote_posted_by(); ?>
	</div>
		<?php
}
?>
