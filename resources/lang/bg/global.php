<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'approved' => 'Approved',		],	],
		'vacancies' => [		'title' => 'Вакансии',		'fields' => [			'title' => 'Заголовок',			'sphere-id' => 'Сфера деятельности',			'text' => 'Текст',			'wage' => 'Заработная плата',			'company-address' => 'Адрес фирмы',			'schedule-id' => 'График работы',			'experience' => 'Опыт работы',			'lasting' => 'Актуальность (дней)',			'logotype' => 'Логотип',			'phone' => 'Телефон',			'phone-temp' => 'Телефон вспом.',			'created-by' => 'Created by',			'to-delete-at' => 'To delete at',		],	],
		'spheres' => [		'title' => 'Сферы деятельности',		'fields' => [			'title' => 'Сфера деятельности',			'slug' => 'Slug',		],	],
		'schedule' => [		'title' => 'График работы',		'fields' => [			'title' => 'График работы',			'slug' => 'Slug',		],	],
		'experience' => [		'title' => 'Опыт работы',		'fields' => [			'title' => 'Опыт работы',			'slug' => 'Slug',		],	],
		'lasting' => [		'title' => 'Актуальность',		'fields' => [			'lasting' => 'Актуальность',			'slug' => 'Slug',		],	],
		'resume' => [		'title' => 'Резюме',		'fields' => [			'title' => 'Заголовок',			'sphere-id' => 'Сфера деятельности',			'text' => 'Текст',			'wage' => 'Заработная плата',			'company-address' => 'Контакты',			'schedule-id' => 'График работы',			'experience' => 'Опыт работы',			'lasting' => 'Актуальность (дней)',			'avatar' => 'Аватар',			'phone' => 'Телефон',			'phone-temp' => 'Телефон вспом.',			'created-by' => 'Created by',			'to-delete-at' => 'To delete at',		],	],
		'phones' => [		'title' => 'Телефоны',		'fields' => [			'phone' => 'Телефон',			'code' => 'Код',			'status' => 'Статус',			'created-by' => 'Created by',		],	],
		'companies' => [		'title' => 'Организации',		'fields' => [			'name' => 'Название',			'describition' => 'Описание',			'sphere' => 'Сфера деятельности',			'address' => 'Адрес',			'site' => 'Сайт',			'phone' => 'Телефон',			'contacts' => 'Доп. контакты',			'rating' => 'Рейтинг',			'moder-checking' => 'Проверка модератора',			'created-by' => 'Created by',		],	],
	'app_create' => 'Създай',
	'app_save' => 'Запази',
	'app_edit' => 'Промени',
	'app_view' => 'Покажи',
	'app_update' => 'Обнови',
	'app_list' => 'Списък',
	'app_no_entries_in_table' => 'Няма записи в таблицата',
	'app_custom_controller_index' => 'Персонализиран контролер.',
	'app_logout' => 'Изход',
	'app_add_new' => 'Добави нов',
	'app_are_you_sure' => 'Сигурни ли сте?',
	'app_back_to_list' => 'Обратно към списъка',
	'app_dashboard' => 'Табло',
	'app_delete' => 'Изтрий',
	'global_title' => 'Работа',
];