<?php
// === Helpers ===
require_once get_template_directory() . '/functions/helpers/theme_asset_version.php';
require_once get_template_directory() . '/functions/helpers/print_dump.php';
require_once get_template_directory() . '/functions/helpers/mx_logo.php';
require_once get_template_directory() . '/functions/helpers/scf-functions.php';
//require_once get_template_directory() . '/functions/helpers/trim_text.php';
require_once get_template_directory() . '/functions/helpers/correct_phone.php';
require_once get_template_directory() . '/functions/helpers/get_titles_from_query_to_json.php';

/** Добавление картинки для кастомных полей в таблице админки
 * add_admin_thumbnail_column('castom-post-slug'); // projects
 */
require_once get_template_directory() . '/functions/helpers/add_admin_thumbnail_column.php';
add_admin_thumbnail_column('product');

//require_once get_template_directory() . '/functions/helpers/get_prev_post_slug.php';
//require_once get_template_directory() . '/functions/helpers/get_next_post_slug.php';
//require_once get_template_directory() . '/functions/helpers/custom_product_category.php';
//require_once get_template_directory() . '/functions/helpers/get_product_attributes_array.php';

// === BASE ====
// Общая настройка темы (лого, название и т.п.)
require_once get_template_directory() . '/functions/default_settings.php';

// Подключение стилей
require_once get_template_directory() . '/functions/connect_styles.php';

// Подключение скриптов
require_once get_template_directory() . '/functions/connect_scripts.php';

// Отключение стилей Woocommerce
//add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Поддержка темы на Woocommerce
//add_action('after_setup_theme', function () {
//	add_theme_support('woocommerce');
//});
// Создание меню
require_once get_template_directory() . '/functions/register_nav_menus.php';

// Регистрация новых записей
require_once get_template_directory() . '/functions/register_post_type.php';

// Кастомная админка
require_once get_template_directory() . '/functions/admin_page.php';


// Создание SCF-полей
require_once get_template_directory() . '/functions/scf_data.php';


//!
//add_action('wp_head', function () {
//	if (defined('WP_DEBUG')) {
//		$vite_server = 'http://localhost:5173';
//		echo "<!-- VITE DEV INJECT: start -->\n";
//		echo '<script type="module" src="' . esc_url($vite_server) . '/@vite/client"></script>';
//		echo '<script type="module" src="' . esc_url($vite_server) . '/main.js"></script>';
//		echo "<!-- VITE DEV INJECT: end -->\n";
//	};
//});


add_filter('bcn_breadcrumb_title', function ($title, $type, $id) {

	$front_page_id = get_option('page_on_front');

	// Если это крошка главной
	if (in_array('home', $type) && $front_page_id) {
		return get_the_title($front_page_id);
	}

	return $title;

}, 10, 3);

// Убираем разделитель
add_filter('bcn_display_separator', '__return_empty_string');
/*
function my_breadcrumbs($is_tax = false)
{
	if (!function_exists('pll_get_post')) {
		return;
	}

	echo '<nav class="my-breadcrumbs">';

	// Главная страница (с учётом языка)
	$home_id = pll_get_post(get_option('page_on_front'));
	$home_url = get_permalink($home_id);
	$home_title = get_the_title($home_id);

	echo '<a href="' . esc_url($home_url) . '">' . esc_html($home_title) . '</a>';

	// SINGLE POST / PAGE
	if (is_singular()) {

		$post_type = get_post_type();
		$post_type_obj = get_post_type_object($post_type);

		// Архив CPT
		if ($post_type_obj && $post_type_obj->has_archive) {

			$archive_slug = $post_type_obj->rewrite['slug'] ?? '';

			if ($archive_slug) {

				$archive_page = get_page_by_path($archive_slug);

				if ($archive_page) {

					$archive_id = pll_get_post($archive_page->ID);

					if ($archive_id) {

						$archive_link = get_permalink($archive_id);

						if (!is_wp_error($archive_link)) {

							$archive_title = get_the_title($archive_id);

							echo '<a href="' . esc_url($archive_link) . '">' . esc_html($archive_title) . '</a>';
						}
					}
				}
			}
		}

		// Taxonomy для поста
		if ($is_tax) {

			$taxonomies = get_object_taxonomies($post_type);

			foreach ($taxonomies as $taxonomy) {

				$terms = wp_get_post_terms(get_the_ID(), $taxonomy);

				if (!empty($terms) && !is_wp_error($terms)) {

					$term = $terms[0];

					$term_id = function_exists('pll_get_term')
						? pll_get_term($term->term_id)
						: $term->term_id;

					if (!$term_id) {
						$term_id = $term->term_id;
					}

					$term_obj = get_term($term_id);

					if ($term_obj && !is_wp_error($term_obj)) {

						$term_link = get_term_link($term_obj);

						if (!is_wp_error($term_link)) {

							echo '<a href="' . esc_url($term_link) . '">' . esc_html($term_obj->name) . '</a>';
						}
					}
				}
			}
		}

		// Текущий пост
		echo '<span>' . esc_html(get_the_title()) . '</span>';

	}

	// POST TYPE ARCHIVE
	elseif (is_post_type_archive()) {

		$post_type = get_post_type();
		$post_type_obj = get_post_type_object($post_type);

		if ($post_type_obj && $post_type_obj->has_archive) {

			$archive_slug = $post_type_obj->rewrite['slug'] ?? '';

			if ($archive_slug) {

				$archive_page = get_page_by_path($archive_slug);

				if ($archive_page) {

					$archive_id = pll_get_post($archive_page->ID);

					if ($archive_id) {

						echo '<span>' . esc_html(get_the_title($archive_id)) . '</span>';
					}
				}
			}
		}
	}

	// CATEGORY / TAXONOMY / TAG
	elseif (is_tax() || is_category() || is_tag()) {

		$term = get_queried_object();

		$term_id = function_exists('pll_get_term')
			? pll_get_term($term->term_id)
			: $term->term_id;

		if (!$term_id) {
			$term_id = $term->term_id;
		}

		$term_obj = get_term($term_id);

		if ($term_obj && !is_wp_error($term_obj)) {

			echo '<span>' . esc_html($term_obj->name) . '</span>';
		}
	}

	// PAGE
	elseif (is_page()) {

		$page_id = pll_get_post(get_the_ID());

		if ($page_id) {

			echo '<span>' . esc_html(get_the_title($page_id)) . '</span>';
		}
	}

	echo '</nav>';
}
add_action('pre_get_posts', function ($query) {
	// Проверяем: фронтенд, основной запрос, архив CPT "reviews"
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('reviews')) {
		$query->set('posts_per_page', 12);
		$query->set('orderby', 'menu_order'); // если нужно сортировать по menu_order
		$query->set('order', 'ASC');
	}
});
add_action('pre_get_posts', function ($query) {
	// Проверяем: фронтенд, основной запрос, архив CPT "reviews"
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('blog')) {
		$query->set('posts_per_page', 12);
		$query->set('orderby', 'menu_order'); // если нужно сортировать по menu_order
		$query->set('order', 'ASC');
	}
});

add_action('admin_head', function () {
	echo '<style>
				.acf-icon.-duplicate {
					display: inline-block !important;
				}
			</style>';
});
*/
// Перенос 'и' и других предлогов
function mx_fix_orphans($text)
{
	if (is_admin())
		return $text;
	if (!is_string($text))
		return $text;

	return preg_replace('/(\s|&nbsp;)([а-яА-Яa-zA-Z]{1,2})\s/u', '$1$2&nbsp;', $text); //return preg_replace('/\s([а-яА-Яa-zA-Z]{1,2})\s/u', ' $1&nbsp;', $text);
}
// ACF
add_filter('acf/format_value', 'mx_fix_orphans', 20);
add_filter('the_content', 'mx_fix_orphans', 20);
add_filter('the_title', 'mx_fix_orphans', 20);
add_filter('the_excerpt', 'mx_fix_orphans', 20);
add_filter('nav_menu_item_title', 'mx_fix_orphans', 20);

add_action('admin_head', function () {
	echo '<style>
        #postexcerpt p {
            display: none !important;
        }
    </style>';
});
//add_filter('big_image_size_threshold', '__return_false');
