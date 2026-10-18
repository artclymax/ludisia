<?php

create_options_page(
	'Каталог',
	'opt-catalog'
);

create_fields(
	'Каталог',
	'opt-catalog',
	[
		add_field_tab(
			'catalog_tab_cta',
			'Блок с кнопкой запросить подбор',
		),
		add_field_text(
			'catalog_cta_title',
			'Заголовок',
		),
		add_field_redactor_wysiwyg(
			'catalog_cta_descr',
			'Описание',
		),
		add_field_link(
			'catalog_cta_btn',
			'Кнопка',
		)
	]
);
