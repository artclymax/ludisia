<?php
add_action('init', function () {
	register_post_type('product', array(
		'labels' => array(
			'name' => 'Букеты',
			'singular_name' => 'Букет',
			'menu_name' => 'Букеты',
			'name_admin_bar' => 'Букет',
			'add_new' => 'Добавить букет',
			'add_new_item' => 'Добавить новый букет',
			'new_item' => 'Новый букет',
			'edit_item' => 'Редактировать букет',
			'view_item' => 'Посмотреть букет',
			'all_items' => 'Все букеты',
			'search_items' => 'Поиск букетов',
			'not_found' => 'Букеты не найдены',
			'not_found_in_trash' => 'Букеты не найдены в корзине',
		),
		'menu_icon' => 'dashicons-heart',
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => [
			'slug' => 'product',
			'with_front' => false,
			'pages' => true, // важно для /page/2/
			'feeds' => true
		],
		'capability_type' => 'post',
		'has_archive' => true, // true
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', ), // 'excerpt',
		'show_in_rest' => false, //! редактор гутенберг
	));
});

add_action('init', function () {
	register_post_type('faq', array(
		'labels' => array(
			'name' => 'Частые вопросы',
			'singular_name' => 'Частый вопрос',
			'menu_name' => 'Частые вопросы',
			'name_admin_bar' => 'Частый вопрос',
			'add_new' => 'Добавить вопрос',
			'add_new_item' => 'Добавить новый вопрос',
			'new_item' => 'Новый вопрос',
			'edit_item' => 'Редактировать вопрос',
			'view_item' => 'Посмотреть вопрос',
			'all_items' => 'Все вопросы',
			'search_items' => 'Поиск вопросов',
			'not_found' => 'Вопросы не найдены',
			'not_found_in_trash' => 'Вопросы не найдены в корзине',
		),
		'menu_icon' => 'dashicons-editor-help',
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => [
			'slug' => 'faq',
			'with_front' => false,
			'pages' => true, // важно для /page/2/
			'feeds' => true
		],
		'capability_type' => 'post',
		'has_archive' => true, // true
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', ), // 'excerpt',
		'show_in_rest' => false, //! редактор гутенберг
	));
});
