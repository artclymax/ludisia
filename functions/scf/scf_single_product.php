<?php

create_fields(
	'Карточка товара',
	'product',
	[
		add_field_text(
			'product_price',
			'Цена',
		),
	],
	'post_type'
);