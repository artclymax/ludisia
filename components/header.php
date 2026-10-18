<?php
$page = 'options';
$btn = get_field('header_btn', $page) ?? [];
$phone = get_field('header_phone', $page) ?? '';
?>
<header class="header" data-auto-calc="header, height">
	<div class="header__container container">
		<div class="header__wrapper">
			<div class="header__logo logo">
				<?php mx_logo(); ?>
			</div>
			<nav class="header__menu header-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'container' => false,
						'menu_class' => 'header-menu__list',
						'depth' => 1
					)
				); ?>
				<div class="header-menu__btn-box">
					<a class="header-menu__phone hidden-tablet icon icon--phone"
						href="tel:+<?php echo esc_attr(correct_phone($phone)) ?>">
						<?php echo esc_html($phone) ?>
					</a>
					<a class="btn header-menu__btn" href="<?php echo esc_attr($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				</div>
			</nav>
			<a class="header__phone-btn phone-btn visible-tablet" aria-label="Позвонить"
				href="tel:+<?php echo esc_attr(correct_phone($phone)) ?>">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M12.5397 7.59474C12.226 6.5484 12.0103 5.47515 11.8954 4.38887C11.7806 3.30586 10.8351 2.5 9.74624 2.5H4.69463C3.39517 2.5 2.39479 3.6225 2.50887 4.91611C3.66062 17.9539 14.0461 28.3386 27.0839 29.4911C28.3782 29.6052 29.5 28.6085 29.5 27.309V22.8044C29.5 21.1605 28.6941 20.2186 27.6111 20.1038C26.5249 19.9891 25.4516 19.7737 24.4053 19.4603C23.7849 19.2763 23.1263 19.2637 22.4993 19.4237C21.8723 19.5838 21.3003 19.9105 20.844 20.3693L18.6816 22.5316C14.782 20.419 11.581 17.2179 9.46836 13.3184L11.6307 11.156C12.0896 10.6998 12.4165 10.1278 12.5766 9.50082C12.7368 8.87384 12.7235 8.21519 12.5397 7.59474Z"
						fill="currentColor" />
				</svg>
			</a>
			<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть/закрыть меню">
				<span></span>
			</button>
		</div>
	</div>
</header>