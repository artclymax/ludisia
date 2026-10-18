<?php
$page = 'options';

$title = get_field('thank_you_title', $page) ?? '';
$descr = get_field('thank_you_descr', $page) ?? '';
$btn = get_field('thank_you_btn', $page) ?? '';
$image = get_field('thank_you_image', $page) ?? '';
$image_mobile = get_field('thank_you_image_mobile', $page) ?? '';
?>
<section class="hero-404" id="hero-404">
	<div class="container hero-404__container">
		<div class="hero-404__body">
			<div class="hero-404__content">
				<h1 class="hero-404__title title-1">
					<?php echo esc_html($title) ?>
				</h1>
				<div class="hero-404__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<a class="hero-404__btn btn" href="<?php echo esc_attr($btn['url']) ?>">
				<?php echo esc_html($btn['title']) ?>
			</a>
		</div>
	</div>
	<div class="hero-404__bg-box image-box">
		<?php echo wp_get_attachment_image(
			$image['ID'],
			'large',
			false,
			array(
				'class' => 'hero-404__bg-big',
				'alt' => $image['alt'] ?: ''
			)
		); ?>
		<?php echo wp_get_attachment_image(
			$image_mobile['ID'],
			'large',
			false,
			array(
				'class' => 'hero-404__bg-small',
				'alt' => $image_mobile['alt'] ?: ''
			)
		); ?>
	</div>
</section>