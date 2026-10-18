<?php
$page = 'options';

$title = get_field('hero_title', $page) ?? '';
$btn = get_field('hero_btn', $page) ?? '';
$btn_msg = get_field('hero_btn_msg', $page) ?? '';
$list = get_field('hero_list', $page) ?? '';
$benefits = get_field('hero_benefits', $page) ?? '';
$image = get_field('hero_image', $page) ?? '';
$image_mobile = get_field('hero_image_mobile', $page) ?? '';
?>
<section class="hero" id="hero">
	<div class="container hero__container">
		<div class="hero__body">
			<h1 class="hero__title title-1">
				<?php echo esc_html($title) ?>
			</h1>
			<?php if ($list): ?>
				<ul class="hero__list hero-list">
					<?php foreach ($list as $item): ?>
						<li class="hero-list__item">
							<?php echo esc_html($item['hero_list_text']) ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<div class="hero__btn-box">
				<a class="hero__btn btn" href="<?php echo esc_attr($btn['url']) ?>">
					<?php echo esc_html($btn['title']) ?>
				</a>
				<a class="hero__btn icon btn btn--secondary btn--icon" href="<?php echo esc_attr($btn_msg['url']) ?>">
					<span><?php echo esc_html($btn_msg['title']) ?></span>
				</a>
			</div>
			<?php if ($benefits): ?>
				<ul class="hero__benefits hero-benefits">
					<?php foreach ($benefits as $item): ?>
						<li class="hero-benefits__item">
							<div class="hero-benefits__icon">
								<?php echo wp_get_attachment_image(
									$item['hero_benefits_image']['ID'],
									'large',
									false,
									array(
										'class' => 'img',
										'alt' => $item['hero_benefits_image']['alt'] ?: $item['hero_benefits_text']
									)
								); ?>
							</div>
							<p class="hero-benefits__text">
								<?php echo esc_html($item['hero_benefits_text']) ?>
							</p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<div class="hero__bg-box image-box">
		<?php echo wp_get_attachment_image(
			$image['ID'],
			'large',
			false,
			array(
				'class' => 'hero__bg-big',
				'alt' => $image['alt'] ?: ''
			)
		); ?>
		<?php echo wp_get_attachment_image(
			$image_mobile['ID'],
			'large',
			false,
			array(
				'class' => 'hero__bg-small',
				'alt' => $image_mobile['alt'] ?: ''
			)
		); ?>
	</div>
</section>