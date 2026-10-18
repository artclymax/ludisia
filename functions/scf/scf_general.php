<?php

create_options_page(
	'Общие настройки',
	'opt-general'
);
create_fields(
	'Общие настройки',
	'opt-general',
	[
		add_field_tab(
			'general_tab_card',
			'Карточка товара',
		),
		add_field_text(
			'product_card_btn',
			'Кнопка подробнее',
		),
		add_field_link(
			'product_card_link',
			'Кнопка КП',
		),
	]
);