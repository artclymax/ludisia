<?php
$page = 'options';
$title = get_field('faq_title', $page) ?? '';
$descr = get_field('faq_descr', $page) ?? '';
$title_cta = get_field('faq_cta', $page)['faq_cta_title'] ?? '';
$text_cta = get_field('faq_cta', $page)['faq_cta_text'] ?? '';
$messengers = get_field('contacts_messengers', $page) ?? '';

$args = [
	'post_type' => 'faq',
	'posts_per_page' => -1, // все записи
	'orderby' => 'menu_order',
	'order' => 'ASC'
];

$query = new WP_Query($args);
?>
<section class="faq" id="faq">
	<div class="container container--narrow faq__container">
		<div class="faq__header section-header">
			<h2 class="faq__title section-header__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="faq__descr descr section-header__descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
		</div>
		<ul class="faq__list">
			<?php if ($query->have_posts()):
				$post_count = 0;
				while ($query->have_posts()):
					$query->the_post();
					$post_count++;
					$spoiler_class = ($post_count === 1) ? 'faq__item faq-item spoiler-active' : 'faq__item faq-item';
					?>
					<li class="<?php echo $spoiler_class; ?>" data-spoiler>
						<button class="faq-item__btn" data-spoiler-title>
							<h3 class="faq-item__title">
								<?php the_title() ?>
							</h3>
							<div class="faq-item__icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M4 7L10.5 13L17 7" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round"
										stroke-linejoin="round" />
								</svg>
							</div>
						</button>
						<div class="faq-item__content" data-spoiler-content>
							<div class="faq-item__descr descr">
								<?php the_content(); ?>
							</div>
						</div>
					</li>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</ul>
		<div class="faq__cta faq-cta">
			<h3 class="faq-cta__title title-3">
				<?php echo esc_html($title_cta) ?>
			</h3>
			<div class="faq-cta__socials-box">
				<p class="faq-cta__text">
					<?php echo esc_html($text_cta) ?>
				</p>
				<?php if ($messengers): ?>
					<ul class="faq-cta__socials faq-cta-socials">
						<?php foreach ($messengers as $item): ?>
							<li class="faq-cta-socials__item">
								<a class="faq-cta-socials__link icon"
									href="<?php echo esc_attr($item['contacts_messengers_link']['url']) ?>">
									<span><?php echo esc_html($item['contacts_messengers_link']['title']) ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>