<?php
/**
 * Template part for displaying fronpage FAQs section
 *
 * @package Beatsmandu
 */
?>
<section class="section_faqs section_four">
	<div class="overlay"></div>
	<div class="container">
		<div class="column">
			<?php if ( get_theme_mod( 'faqs_title' ) || get_theme_mod( 'faqs_subtitle' ) || get_theme_mod( 'faqs_desc' ) ) : ?>
			<div class="section_header">
				<?php if ( get_theme_mod( 'faqs_title' ) ) : ?>
				<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'faqs_title' ) ); ?></h2>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'faqs_desc' ) ) : ?>
				<h3 class="sec-description"><?php echo wp_kses_post( wpautop( get_theme_mod( 'faqs_desc' ) ) ); ?></h3>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php
				$active_faqs = get_theme_mod( 'front_faqs' );
			if ( $active_faqs ) {
				?>
			<ul class="column-1 <?php echo ( 'two' === get_theme_mod( 'faqs_column' ) ? 'column-2' : '' ); ?>">
				<?php foreach ( $active_faqs as $key => $active_faq ) : ?>
				<li class="column-content <?php echo esc_attr( $active_faq['faqs_expand'] ? 'active' : '' ); ?>">
					<?php if ( $active_faq['faq_question'] ) : ?>
					<h6 class="sub_heading beats-span">
						<?php echo esc_html( $active_faq['faq_question'] ); ?></h6>
					<?php endif; ?>
					<?php if ( $active_faq['faq_answer'] ) : ?>
					<div class="paragraph">
						<p><?php echo esc_html( $active_faq['faq_answer'] ); ?></p>
					</div>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php }; ?>
		</div>
	</div>
</section>
