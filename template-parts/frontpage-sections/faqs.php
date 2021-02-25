<?php

/**
 * Template part for displaying fronpage FAQs section
 *
 * @package Beatsmandu
 */
?>
<?php if (get_theme_mod('faqs_title') || get_theme_mod('faqs_subtitle') || get_theme_mod('faqs_desc')) : ?>
	<section class="section_faqs section_four">
		<div class="overlay"></div>
		<div class="container">
			<?php if (get_theme_mod('faqs_title') || get_theme_mod('faqs_subtitle') || get_theme_mod('faqs_desc')) : ?>
				<div class="section_header">
					<?php if (get_theme_mod('faqs_title')) : ?>
						<h2 class="section-heading"><?php echo esc_html(get_theme_mod('faqs_title')); ?></h2>
					<?php endif; ?>
					<?php if (get_theme_mod('faqs_desc')) : ?>
						<h3 class="sec-description"><?php echo wp_kses_post(get_theme_mod('faqs_desc')); ?></h3>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php
			$active_faqs = get_theme_mod('front_faqs');
			if ($active_faqs) {
			?>
				<div class="accordion column-1 <?php echo ('two' === get_theme_mod('faqs_column') ? 'column-2' : ''); ?>" id="beatsAccordian">
					<?php foreach ($active_faqs as $key => $active_faq) : ?>
						<div class="accordion-item <?php echo esc_attr($active_faq['faqs_expand'] ? 'active' : ''); ?>">
							<?php if ($active_faq['faq_question']) : ?>
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($key); ?>" aria-expanded="true" aria-controls="collapseOne">
									<?php echo esc_html($active_faq['faq_question']); ?>
								</button>
							<?php endif; ?>
							<?php if ($active_faq['faq_answer']) : ?>
								<div id="collapse-<?php echo esc_attr($key); ?>" class="accordion-collapse collapse <?php echo esc_attr($active_faq['faqs_expand'] ? 'show' : ''); ?>" aria-labelledby="headingOne" data-bs-parent="#beatsAccordian">
									<div class="paragraph accordion-body">
										<p><?php echo esc_html($active_faq['faq_answer']); ?></p>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php }; ?>
		</div>
	</section>
<?php endif; ?>