<?php
/**
 * Template part for displaying thumbnail Posts page
 *
 * @package Highnote
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
<figure>
	<?php the_post_thumbnail(); ?>
</figure>
<?php endif; ?>
