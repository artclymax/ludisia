<?php
$page = 'options';
$title = get_field('showcase_title', $page) ?? '';
$descr = get_field('showcase_descr', $page) ?? '';
$btn = get_field('showcase_btn', $page) ?? '';
$args = [
	'post_type' => 'product',
	'posts_per_page' => -1, // все записи
	'orderby' => 'menu_order',
	'order' => 'ASC'
];

$query = new WP_Query($args);
?>
<section class="showcase" id="showcase">
	<div class="container showcase__container">
		<div class="showcase__header section-header">
			<h2 class="showcase__title section-header__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="showcase__descr descr section-header__descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
		</div>
		<ul class="showcase__list grid">
			<?php if ($query->have_posts()):
				while ($query->have_posts()):
					$query->the_post(); ?>
					<li class="showcase__item showcase-item">
						<a class="showcase-item__link" href="<?php echo esc_attr($btn['url']) ?>">
							<div class="showcase-item__image image-box">
								<?php the_post_thumbnail() ?>
							</div>
							<div class="showcase-item__info">
								<h3 class="showcase-item__title title-4">
									<?php the_title() ?>
								</h3>
								<div class="showcase-item__price-box">
									<span class="showcase-item__price">
										<?php echo esc_html(get_field('product_price') ?? '') ?>
									</span>
									<span class="showcase-item__btn icon icon--after">
										<span><?php echo esc_html($btn['title']) ?></span>
									</span>
								</div>
							</div>
						</a>
					</li>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</ul>
	</div>
</section>