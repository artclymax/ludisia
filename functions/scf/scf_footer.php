<?php

create_options_page(
	'Подвал / Футер',
	'opt-footer'
);

create_fields(
	'Подвал / Футер',
	'opt-footer',
	[
		add_field_image(
			'footer_logo',
			'Логотип 2',
		),
		add_field_text(
			'footer_copy',
			'Название компании / Копирайт',
		),
		add_field_redactor_wysiwyg(
			'footer_descr',
			'Описание',
		),
		add_field_text(
			'footer_info_title',
			'Заголовок ссылок',
		),
		add_field_repeater(
			'footer_links',
			'Ссылки',
			[
				add_field_link(
					'footer_links_link',
					'Ссылка',
				),
			]
		),
		add_field_text(
			'footer_contacts_title',
			'Заголовок контактов',
		),
	]
);