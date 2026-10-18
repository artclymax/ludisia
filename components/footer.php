<?php
$page = 'options';

$logo = get_field('footer_logo', $page) ?? '';
$descr = get_field('footer_descr', $page) ?? get_bloginfo('description');
$footer_info_title = get_field('footer_info_title', $page) ?? '';
$links = get_field('footer_links', $page) ?? '';
$footer_contacts_title = get_field('footer_contacts_title', $page) ?? '';
$phones = get_field('contacts_phones', $page) ?? '';
$messengers = get_field('contacts_messengers', $page) ?? '';
$address = get_field('contacts_address', $page) ?? '';
$time = get_field('contacts_time', $page) ?? '';
$copy = get_field('footer_copy', $page) ?? get_bloginfo('name');

?>
<footer class="footer" id="footer">
	<div class="container footer__container">
		<div class="footer__top">
			<div class="footer__brand">
				<div class="footer__logo logo">
					<?php mx_logo('', $logo); ?>
				</div>
				<div class="footer__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<div class="footer__legal-box">
				<h4 class="footer__title">
					<?php echo esc_html($footer_info_title) ?>
				</h4>
				<?php if ($links): ?>
					<div class="footer__legal">
						<?php foreach ($links as $item): ?>
							<a class="footer__legal-link" href="<?php echo esc_attr($item['footer_links_link']['url']) ?>">
								<?php echo esc_html($item['footer_links_link']['title']) ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="footer__contacts-box">
				<h4 class="footer__title">
					<?php echo esc_html($footer_contacts_title) ?>
				</h4>
				<div class="footer__contacts footer-contacts">
					<?php if ($phones):
						foreach ($phones as $item): ?>
							<a class="footer-contacts__phone"
								href="tel:+<?php echo esc_attr(correct_phone($item['contacts_phones_phone'])) ?>">
								<?php echo esc_html($item['contacts_phones_phone']) ?>
							</a>
						<?php endforeach;
					endif; ?>
					<?php if ($messengers): ?>
						<ul class="footer-contacts__socials footer-contacts-socials">
							<?php foreach ($messengers as $item): ?>
								<li class="footer-contacts-socials__item">
									<a class="footer-contacts-socials__link icon"
										href="<?php echo esc_attr($item['contacts_messengers_link']['url']) ?>">
										<span>
											<?php echo esc_html($item['contacts_messengers_link']['title']) ?>
										</span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<address class="footer-contacts__address descr">
						<?php echo wp_kses_post($address) ?>
					</address>
					<div class="footer-contacts__work-time descr">
						<?php echo wp_kses_post($time) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__bottom">
			<p class="footer__copyright">
				&copy; <?php echo date('Y') . ' ' . esc_html($copy) ?>
			</p>
		</div>
	</div>
</footer>