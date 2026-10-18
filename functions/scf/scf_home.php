<?php

create_options_page(
	'Главная',
	'opt-home'
);

create_options_page(
	'Первый экран',
	'opt-home-hero',
	'opt-home',
);


create_fields(
	'Первый экран',
	'opt-home-hero',
	[
		add_field_text(
			'hero_title',
			'Заголовок',
		),
		add_field_repeater(
			'hero_list',
			'Список',
			[
				add_field_text(
					'hero_list_text',
					'Текст',
				)
			]
		),
		add_field_link(
			'hero_btn',
			'Первая кнопка',
		),
		add_field_link(
			'hero_btn_msg',
			'Вторая кнопка',
		),
		add_field_repeater(
			'hero_benefits',
			'Список преимуществ',
			[
				add_field_image(
					'hero_benefits_image',
					'Иконка',
				),
				add_field_text(
					'hero_benefits_text',
					'Текст',
				),
			]
		),
		add_field_image(
			'hero_image',
			'Фон',
		),
		add_field_image(
			'hero_image_mobile',
			'Фон мобильный',
		),
	]
);

//! opt-showcase
create_options_page(
	'Витрина',
	'opt-showcase',
	'opt-home',
);


create_fields(
	'Витрина',
	'opt-showcase',
	[
		add_field_text(
			'showcase_title',
			'Заголовок',
		),
		add_field_redactor_wysiwyg(
			'showcase_descr',
			'Описание',
		),
		add_field_link(
			'showcase_btn',
			'Кнопка на карточке товара',
		),

	]
);

//! opt-offer
create_options_page(
	'Оставьте заявку',
	'opt-offer',
	'opt-home',
);


create_fields(
	'Оставьте заявку',
	'opt-offer',
	[
		add_field_text(
			'offer_title',
			'Заголовок',
		),
		add_field_text(
			'offer_subtitle',
			'Подзаголовок',
		),
		add_field_redactor_wysiwyg(
			'offer_descr',
			'Описание',
		),
		add_field_repeater(
			'offer_list',
			'Список',
			[
				add_field_image(
					'offer_list_image',
					'Картинка',
				),
				add_field_text(
					'offer_list_title',
					'Заголовок',
				),
				add_field_redactor_wysiwyg(
					'offer_list_descr',
					'Описание',
				),
			],
			null,
			[
				'layout' => 'block',
				'collapsed' => 'field_offer_list_title',
			]
		),
		add_field_text(
			'offer_title_form',
			'Заголовок формы',
		),
		add_field_redactor_wysiwyg(
			'offer_descr_form',
			'Описание формы',
		),
		add_field_text(
			'offer_messengers_text',
			'Текст мессенджера',
		),
	]
);

//! opt-about
create_options_page(
	'О компании',
	'opt-about',
	'opt-home',
);


create_fields(
	'О компании',
	'opt-about',
	[
		add_field_text(
			'about_title',
			'Заголовок',
		),
		add_field_redactor_wysiwyg(
			'about_descr',
			'Описание',
		),
		add_field_repeater(
			'about_list',
			'Список',
			[
				add_field_text(
					'about_list_title',
					'Заголовок',
				),
				add_field_text(
					'about_list_text',
					'Описание',
				),
			]
		),
		add_field_image(
			'about_image',
			'Картинка',
		),
	]
);

//! opt-faq
create_options_page(
	'Частые вопросы',
	'opt-faq',
	'opt-home',
);

create_fields(
	'Частые вопросы',
	'opt-faq',
	[
		add_field_text(
			'faq_title',
			'Заголовок',
		),
		add_field_redactor_wysiwyg(
			'faq_descr',
			'Описание',
		),
		add_field_group(
			'faq_cta',
			'Напишите нам',
			[
				add_field_text(
					'faq_cta_title',
					'Заголовок',
				),
				add_field_text(
					'faq_cta_text',
					'Текст',
				),
			]
		),

	]
);
