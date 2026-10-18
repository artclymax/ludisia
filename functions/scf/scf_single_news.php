<?php

create_fields(
	'Картинка',
	'news',
	[
		add_field_image(
			'news_image',
			'Картинка',
		),
		add_field_select(
			'news_image_position_y',
			'Картинка - Расположение по вертикали',
			[
				'top' => 'Сверху',
				'bottom' => 'Снизу',
			]
		),
		add_field_select(
			'news_image_position_x',
			'Картинка - Расположение по горизонтали',
			[
				'left' => 'Слева',
				'right' => 'Справа',
			]
		),
	],
	'post_type'
);