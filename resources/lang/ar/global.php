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
	'app_create' => 'إنشاء',
	'app_save' => 'حفظ',
	'app_edit' => 'تعديل',
	'app_restore' => 'استرجاع',
	'app_permadel' => 'حذف نهائي',
	'app_all' => 'الكل',
	'app_trash' => 'المحذوفات',
	'app_view' => 'عرض',
	'app_update' => 'تحيث',
	'app_list' => 'القائمة',
	'app_no_entries_in_table' => 'لا توجد بيانات في الجدول',
	'app_logout' => 'خروج',
	'app_add_new' => 'أضف جديد',
	'app_are_you_sure' => 'هل أنت متأكد؟',
	'app_back_to_list' => 'الرجوع للقائمة',
	'app_dashboard' => 'لوحة التحكم',
	'app_delete' => 'حذف',
	'app_delete_selected' => 'حذف المحدد',
	'app_category' => 'قسم',
	'app_categories' => 'أقسام',
	'app_sample_category' => 'نموذج قسم',
	'app_questions' => 'الأسئلة',
	'app_question' => 'سؤال',
	'app_answer' => 'إجابة',
	'app_sample_question' => 'نموذج سؤال',
	'app_sample_answer' => 'نموذج إجابة',
	'app_administrator_can_create_other_users' => 'المدير (يستطيع إنشاء مستخدمين اخرين)',
	'app_simple_user' => 'مستخدم عادي',
	'app_title' => 'العنوان',
	'app_roles' => 'المجموعات',
	'app_role' => 'مجموعة',
	'app_user_management' => 'إدارة المستخدم',
	'app_users' => 'المستخدمين',
	'app_user' => 'مستخدم',
	'app_name' => 'الاسم',
	'app_email' => 'البريد الالكتروني',
	'app_password' => 'كلمة المرور',
	'app_permissions' => 'التصاريح',
	'app_user_actions' => 'افعال المستخدم',
	'app_time' => 'الوقت',
	'app_description' => 'الوصف',
	'app_coupons' => 'كوبونات',
	'app_code' => 'كود',
	'app_projects' => 'المشاريع',
	'app_reports' => 'التقارير',
	'app_work_type' => 'نوع العمل',
	'app_work_types' => 'انواع العمل',
	'app_project' => 'مشروع',
	'global_title' => 'Работа',
];