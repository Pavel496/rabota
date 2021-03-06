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
	'app_create' => 'बनाइए (क्रिएट)',
	'app_save' => 'सुरक्षित करे ',
	'app_edit' => 'संपादित करे (एडिट)',
	'app_view' => 'देखें',
	'app_update' => 'सुधारे ',
	'app_list' => 'सूची',
	'app_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'app_custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'app_logout' => 'लोग आउट',
	'app_add_new' => 'नया समाविष्ट करे',
	'app_are_you_sure' => 'आप निस्चित है ?',
	'app_back_to_list' => 'सूची पे वापस जाए',
	'app_dashboard' => 'डॅशबोर्ड ',
	'app_delete' => 'मिटाइए',
	'global_title' => 'Работа',
];