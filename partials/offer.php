<?php
$page = 'options';
$title = get_field('offer_title', $page) ?? '';
$subtitle = get_field('offer_subtitle', $page) ?? '';
$descr = get_field('offer_descr', $page) ?? '';
$list = get_field('offer_list', $page) ?? '';

$title_form = get_field('offer_title_form', $page) ?? '';
$descr_form = get_field('offer_descr_form', $page) ?? '';
$messengers_text = get_field('offer_messengers_text', $page) ?? '';
$messengers = get_field('contacts_messengers', $page) ?? '';
?>
<section class="section offer" id="offer">
	<div class="container offer__container">
		<div class="offer__header">
			<h2 class="offer__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<p class="offer__subtitle title-3">
				<?php echo esc_html($subtitle) ?>
			</p>
			<div class="offer__descr descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
		</div>
		<div class="offer__wrapper">
			<?php if ($list): ?>
				<ul class="offer__list">
					<?php foreach ($list as $item): ?>
						<li class="offer__item offer-item">
							<div class="offer-item__image">
								<?php echo wp_get_attachment_image(
									$item['offer_list_image']['ID'],
									'large',
									false,
									array(
										'class' => 'img',
										'alt' => $item['offer_list_image']['alt'] ?: $item['offer_list_title']
									)
								); ?>
							</div>
							<h3 class="offer-item__title title-4">
								<?php echo esc_html($item['offer_list_title']) ?>
							</h3>
							<div class="offer-item__descr descr">
								<?php echo wp_kses_post($item['offer_list_descr']) ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<div class="offer__form">
				<h3 class="offer__form-title title-3">
					<?php echo esc_html($title_form) ?>
				</h3>
				<div class="offer__form-descr descr">
					<?php echo wp_kses_post($descr_form) ?>
				</div>
				<div class="offer__form-wrapper">
					<?php echo do_shortcode('[contact-form-7 id="008f619" title="Оставьте заявку"]') ?>
				</div>
				<div class="offer__cta">
					<p class="offer__cta-text">
						<?php echo esc_html($messengers_text) ?>
					</p>
					<?php if ($messengers): ?>
						<ul class="offer__messengers faq-cta__socials faq-cta-socials">
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
	</div>
</section>