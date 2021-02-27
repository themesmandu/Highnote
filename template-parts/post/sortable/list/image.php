<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Highnote
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
<figure class="col-md-4 column">
	<?php the_post_thumbnail(); ?>
</figure>
<?php endif; ?>
