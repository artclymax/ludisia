<?php
$page = 'options';
$title = get_field('about_title', $page) ?? '';
$descr = get_field('about_descr', $page) ?? ''; 
$list = get_field('about_list', $page) ?? ''; 
$image = get_field('about_image', $page) ?? '';
?>
<section class="about" id="about">
	<div class="container about__container">
		<div class="about__content">
			<h2 class="about__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="about__descr descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<?php if ($list): ?>
				<ul class="about__list">
					<?php foreach ($list as $item): ?>
						<li class="about__item about-item">
							<p class="about-item__number">
								<?php echo esc_html($item['about_list_title']) ?>
							</p>
							<p class="about-item__text">
								<?php echo esc_html($item['about_list_text']) ?>
							</p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="about__image image-box">
			<?php echo wp_get_attachment_image(
				$image['ID'],
				'large',
				false,
				array(
					'class' => 'img',
					'alt' => $image['alt'] ?: ''
				)
			); ?>
		</div>
	</div>
</section>