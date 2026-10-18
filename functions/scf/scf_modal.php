<?php

create_options_page(
	'Модальные окна',
	'opt-modal'
);

create_fields(
	'Модальные окна',
	'opt-modal',
	[
		add_field_text(
			'modal_call_title',
			'Заголовок',
		),
		add_field_redactor_wysiwyg(
			'modal_call_descr',
			'Описание',
		),
	]
);