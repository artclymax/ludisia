<?php
$page = 'options';
$title = get_field('contacts_title', $page) ?? '';
$subtitle = get_field('contacts_subtitle', $page) ?? '';

$address_title = get_field('contacts_address_title', $page) ?? '';
$address = get_field('contacts_address', $page) ?? '';
$address_label = get_field('contacts_address_text', $page) ?? '';

$time_title = get_field('contacts_time_title', $page) ?? '';
$time = get_field('contacts_time', $page) ?? '';

$phones_title = get_field('contacts_phone_title', $page) ?? '';
$phones = get_field('contacts_phones', $page) ?? '';
$messengers = get_field('contacts_messengers', $page) ?? '';

$socials = get_field('contacts_social', $page) ?? '';

$map = get_field('contacts_map', $page) ?? '';
$map_label = get_field('contacts_map_label', $page) ?? '';
?>
<section class="section contacts" id="contacts">
	<div class="container contacts__container">
		<h2 class="contacts__title title-2"><?php echo esc_html($title) ?></h2>
		<div class="contacts__wrapper">
			<div class="contacts__content">
				<h3 class="contacts__subtitle title-3">
					<?php echo esc_html($subtitle) ?>
				</h3>
				<ul class="contacts__list">
					<?php if ($address): ?>
						<li class="contacts__item icon icon--address">
							<div class="contacts__item-wrapper">
								<h4 class="contacts__item-title">
									<?php echo esc_html($address_title) ?>
								</h4>
								<address class="contacts__address descr">
									<?php echo wp_kses_post($address) ?>
								</address>
								<span class="contacts__label">
									<?php echo esc_html($address_label) ?>
								</span>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($time): ?>
						<li class="contacts__item icon icon--time">
							<div class="contacts__item-wrapper">
								<h4 class="contacts__item-title">
									<?php echo esc_html($time_title) ?>
								</h4>
								<div class="contacts__descr descr">
									<?php echo wp_kses_post($time) ?>
								</div>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($phones): ?>
						<li class="contacts__item icon icon--phone">
							<div class="contacts__item-wrapper">
								<h4 class="contacts__item-title">
									<?php echo esc_html($phones_title) ?>
								</h4>
								<ul class="contacts__item-list">
									<?php foreach ($phones as $item): ?>
										<li class="contacts__item-list-item">
											<a class="contacts__item-link link"
												href="tel:+<?php echo esc_attr(correct_phone($item['contacts_phones_phone'])) ?>">
												<?php echo esc_html($item['contacts_phones_phone']) ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
								<?php if ($messengers): ?>
									<ul class="faq-cta__socials faq-cta-socials">
										<?php foreach ($messengers as $item): ?>
											<li class="faq-cta-socials__item">
												<a class="faq-cta-socials__link icon"
													href="<?php echo esc_attr($item['contacts_messengers_link']['url']) ?>">
													<span>
														<?php echo esc_html($item['contacts_messengers_link']['title']) ?>
													</span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($socials): ?>
						<li class="contacts__item">
							<div class="contacts__item-wrapper">
								<ul class="contacts__social contacts-socials">
									<?php foreach ($socials as $item): ?>
										<li class="contacts-socials__item">
											<a class="contacts-socials__link"
												href="<?php echo esc_attr($item['contacts_social_link']['url']) ?>" target="_blank">
												<div class="contacts-socials__icon">
													<?php echo wp_get_attachment_image(
														$item['contacts_social_image']['ID'],
														'large',
														false,
														array(
															'class' => 'img',
															'alt' => $item['contacts_social_image']['alt'] ?: $item['contacts_social_text']
														)
													); ?>
												</div>
												<div class="contacts-socials__wrapper">
													<p class="contacts-socials__title">
														<?php echo esc_html($item['contacts_social_link']['title']) ?>
													</p>
													<span class="contacts-socials__label">
														<?php echo esc_html($item['contacts_social_text']) ?>
													</span>
												</div>

											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="contacts__map">
				<?php echo wp_kses($map, [
					'iframe' => [
						'src' => true,
						'width' => true,
						'height' => true,
						'style' => true,
						'allowfullscreen' => true,
						'loading' => true,
					],
				]) ?>
				<span class="contacts__map-label icon icon--address"><?php echo esc_html($map_label) ?></span>
			</div>
		</div>
	</div>
</section>