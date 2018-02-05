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
	'app_create' => 'Crear',
	'app_save' => 'Guardar',
	'app_edit' => 'Editar',
	'app_restore' => 'Restaurar',
	'app_permadel' => 'Esborrar permanentment',
	'app_all' => 'Tot',
	'app_trash' => 'Paperera',
	'app_view' => 'Veure',
	'app_update' => 'Actualitzar',
	'app_list' => 'Llista',
	'app_no_entries_in_table' => 'No hi ha registres a la taula',
	'app_logout' => 'Sortir',
	'app_add_new' => 'Afegir nou',
	'app_are_you_sure' => 'Estàs segur?',
	'app_back_to_list' => 'Tornar a la Llista',
	'app_dashboard' => 'Taulell de control',
	'app_delete' => 'Esborrar',
	'app_delete_selected' => 'Esborrar seleccionats',
	'app_category' => 'Categoria',
	'app_categories' => 'Categories',
	'app_sample_category' => 'Categoria d\'exemple',
	'app_questions' => 'Qüestions',
	'app_question' => 'Qüestió',
	'app_answer' => 'Resposta',
	'app_sample_question' => 'Qüestió d\'exemple',
	'app_sample_answer' => 'Resposta d\'exemple',
	'app_faq_management' => 'Gestió de preguntes freqüents',
	'app_administrator_can_create_other_users' => 'Administrador (pot crear altres usuaris)',
	'app_simple_user' => 'Usuari bàsic',
	'app_title' => 'Títol',
	'app_roles' => 'Rols',
	'app_role' => 'Rol',
	'app_user_management' => 'Gestió d\'usuaris',
	'app_users' => 'Usuaris',
	'app_user' => 'Usuari',
	'app_name' => 'Nom',
	'app_email' => 'Correu-e',
	'app_password' => 'Contrasenya',
	'app_remember_token' => 'Recordar token',
	'app_permissions' => 'Permissos',
	'app_project' => 'Projecte',
	'app_start_time' => 'Hora d\'inici',
	'app_end_time' => 'Hora de finalització',
	'app_expense_category' => 'Categoria de la despesa',
	'app_expense_categories' => 'Categories de despeses',
	'app_expense_management' => 'Gestió de despeses',
	'app_expenses' => 'Despeses',
	'app_expense' => 'Despesa',
	'app_entry_date' => 'Data d\'entrada',
	'app_amount' => 'Import',
	'app_income_categories' => 'Categories d\'ingressos',
	'app_monthly_report' => 'Informe mensual',
	'app_companies' => 'Empreses',
	'app_company_name' => 'Empresa',
	'app_address' => 'Adreça',
	'app_website' => 'Lloc web',
	'app_contact_management' => 'Gestió de contactes',
	'app_contacts' => 'Contactes',
	'app_company' => 'Empresa',
	'app_first_name' => 'Nom',
	'app_last_name' => 'Cognoms',
	'app_phone' => 'Telèfon',
	'app_phone1' => 'Telèfon 1',
	'app_phone2' => 'Telèfon 2',
	'app_skype' => 'Skype',
	'app_photo' => 'Foto (max 8Mb)',
	'app_category_name' => 'Categoria',
	'app_product_management' => 'Gestió de productes',
	'app_products' => 'Productes',
	'app_product_name' => 'Producte',
	'app_price' => 'Preu',
	'app_tags' => 'Etiquetes',
	'app_tag' => 'Etiqueta',
	'app_photo1' => 'Foto 1',
	'app_photo2' => 'Foto 2',
	'app_photo3' => 'Foto 3',
	'app_calendar' => 'Calendari',
	'app_statuses' => 'Situacions',
	'app_task_management' => 'Gestió de tasques',
	'app_tasks' => 'Tasca',
	'app_status' => 'Situació',
	'app_attachment' => 'Adjunt',
	'app_due_date' => 'Data límit',
	'app_assigned_to' => 'Assignat a',
	'app_assets' => 'Actius',
	'app_asset' => 'Actiu',
	'app_serial_number' => 'Número de sèrie',
	'app_location' => 'Ubicació',
	'app_locations' => 'Ubicacions',
	'app_assigned_user' => 'Assignat (Usuari)',
	'app_notes' => 'Notes',
	'app_assets_history' => 'Històric d\'actius',
	'app_assets_management' => 'Gestió d\'actius',
	'app_text' => 'Text',
	'app_featured_image' => 'Imatge destacada',
	'app_pages' => 'Pàgines',
	'app_axis' => 'Eixos',
	'app_show' => 'Veure',
	'app_group_by' => 'Agrupar per',
	'app_chart_type' => 'Tipus de gràfic',
	'app_create_new_report' => 'Crear nou informe',
	'app_no_reports_yet' => 'Encara no hi ha informes',
	'app_created_at' => 'Creat el',
	'app_updated_at' => 'Actualitzat el',
	'app_deleted_at' => 'Esborrat el',
	'app_custom_controller_index' => 'index del controlador personalitzat',
	'app_user_actions' => 'Accions de l\'usuari',
	'app_action' => 'Acció',
	'app_action_model' => 'Model d\'acció',
	'app_action_id' => 'Id d\'acció',
	'app_time' => 'Temps',
	'app_campaign' => 'Campanya',
	'app_campaigns' => 'Campanyes',
	'app_description' => 'Descripció',
	'app_valid_from' => 'Vàlid des de',
	'app_valid_to' => 'Vàlid fins a',
	'app_discount_amount' => 'Import del descompte',
	'app_discount_percent' => 'Percentatge de descompte',
	'app_coupons_amount' => 'Import dels cupons',
	'app_coupons' => 'Cupons',
	'app_code' => 'Codi',
	'app_redeem_time' => 'Validesa del cupó',
	'app_coupon_management' => 'Gestió de cupons',
	'app_time_management' => 'Gestió del temps',
	'app_projects' => 'Projectes',
	'app_reports' => 'Informes',
	'app_work_type' => 'Tipus de feina',
	'app_work_types' => 'Tipus de feines',
	'app_slug' => 'Escletxa',
	'app_content_management' => 'Gestió de continguts',
	'app_excerpt' => 'Extracte',
	'app_reports_x_axis_field' => 'Eix-X escull un dels camps data/hora',
	'app_reports_y_axis_field' => 'Eix-Y escull un dels camps numèrics',
	'app_select_crud_placeholder' => 'Si us plau, selecciona un dels teus CRUDs',
	'app_select_dt_placeholder' => 'Si us plau, selecciona un dels camps data/hora',
	'app_aggregate_function_use' => 'Funció agregada a utilitzar',
	'app_x_axis_group_by' => 'Agrupar l\'eix-X per',
	'app_x_axis_field' => 'Camp de l\'eix-X (data/hora)',
	'app_y_axis_field' => 'Camp de l\'eix-Y',
	'app_integer_float_placeholder' => 'Si us plau, selecciona un dels camps enter/real',
	'app_change_notifications_field_1_label' => 'Enviar notificació per correu-e a l\'usuari',
	'app_change_notifications_field_2_label' => 'Quan accedeixes al CRUD',
	'app_select_users_placeholder' => 'Si us plau, selecciona un dels teus Usuaris',
	'app_is_created' => 'està creat',
	'app_is_updated' => 'està actualitzat',
	'app_is_deleted' => 'està esborrat',
	'app_notifications' => 'Notificacions',
	'app_notify_user' => 'Notifica a l\'usuari',
	'app_when_crud' => 'Quan CRUD',
	'app_create_new_notification' => 'Crear nova notificació',
	'app_stripe_transactions' => 'Transaccions d\'Stripe',
	'app_upgrade_to_premium' => 'Actualitza a Premium',
	'app_messages' => 'Missatges',
	'app_you_have_no_messages' => 'No tens missatges',
	'app_all_messages' => 'Tots els missatges',
	'app_new_message' => 'Nou missatge',
	'app_outbox' => 'Safata de sortida',
	'app_inbox' => 'Safata d\'entrada',
	'app_recipient' => 'Destinatari',
	'app_subject' => 'Assumpte',
	'app_message' => 'Missatge',
	'app_send' => 'Envia',
	'app_reply' => 'Respon',
	'app_calendar_sources' => 'Fonts del calendari',
	'app_new_calendar_source' => 'Crear una nova font del calendari',
	'app_crud_title' => 'Títol del Crud',
	'app_crud_date_field' => 'Camp data del Crud',
	'app_prefix' => 'Prefix',
	'app_label_field' => 'Camp etiqueta',
	'app_suffix' => 'Sufix',
	'app_no_calendar_sources' => 'No hi ha fonts del calendari',
	'app_crud_event_field' => 'Camp d\'etiqueta d\'event',
	'app_create_new_calendar_source' => 'Crear una nova font del calendari',
	'app_edit_calendar_source' => 'Editar la font del calendari',
	'app_client_management' => 'Gestió de clients',
	'app_client_management_settings' => 'Paràmetres de la gestió de clients',
	'app_country' => 'País',
	'app_client_status' => 'Estat del client',
	'app_clients' => 'Clients',
	'app_client_statuses' => 'Estats dels clients',
	'app_currencies' => 'Monedes',
	'app_main_currency' => 'Moneda principal',
	'app_documents' => 'Documents',
	'app_file' => 'Fitxer',
	'app_income_source' => 'Font d\'ingressos',
	'app_income_sources' => 'Fonts d\'ingressos',
	'app_fee_percent' => 'Percentatge de comissió',
	'app_note_text' => 'Nota de text',
	'app_client' => 'Client',
	'app_start_date' => 'Datat d\'inici',
	'app_budget' => 'Pressupost',
	'app_project_status' => 'Estat del projecte',
	'app_project_statuses' => 'Estats del projecte',
	'app_transactions' => 'Transaccions',
	'app_transaction_types' => 'Tipus de transacció',
	'app_transaction_type' => 'Tipus de transacció',
	'app_transaction_date' => 'Data de la transacció',
	'app_currency' => 'Moneda',
	'app_current_password' => 'Contrasenya actual',
	'app_new_password' => 'Contrasenya nova',
	'app_password_confirm' => 'Confirma contrassenya nova',
	'app_dashboard_text' => 'T\'has validat correctament!',
	'app_forgot_password' => 'Has oblidat la contrassenya?',
	'app_remember_me' => 'Recorda\'m',
	'app_login' => 'Entrar',
	'app_change_password' => 'Canviar password',
	'app_csv' => 'CSV',
	'app_print' => 'Imprimir',
	'app_excel' => 'Excel',
	'app_copy' => 'Còpia',
	'app_colvis' => 'Columnes visibles',
	'app_pdf' => 'PDF',
	'app_reset_password' => 'Restablir contrassenya',
	'app_reset_password_woops' => 'strong>Vaja!</strong>Hi ha hagut problemes amb input:',
	'app_email_line1' => 'Estàs rebent aquest correu perquè s\'ha solicitat un restablimentd e contrasenya de la teva compte',
	'app_email_line2' => 'Si no has demanat restablir la contrasenya, no cal que facis res',
	'app_email_greet' => 'Hola',
	'app_email_regards' => 'Salutacions',
	'app_confirm_password' => 'Confirma la contrassenya',
	'app_if_you_are_having_trouble' => 'Si tens problemes al fer click ',
	'app_copy_paste_url_bellow' => 'botó, copia i enganxa aquesta adreça web al teu navegador.',
	'app_please_select' => 'Si us plau, selecciona',
	'app_register' => 'Registra',
	'app_registration' => 'Registre',
	'app_not_approved_title' => 'No has estat aprovat',
	'app_not_approved_p' => 'La teva compte no ha estat aprovada per l\'administrador. Si us plau torna a provar en una estona',
	'app_there_were_problems_with_input' => 'Hi ha problemes amb input:',
	'app_whoops' => 'Vaja!',
	'app_file_contains_header_row' => 'El fitxer compté una fila de capçalera?',
	'app_csvImport' => 'importar de CSV',
	'app_csv_file_to_import' => 'Fitxer CSV a importar',
	'app_parse_csv' => 'Analitza CSV',
	'app_import_data' => 'Importar dades',
	'app_imported_rows_to_table' => 'Importades :row files a la taula :taula',
	'global_title' => 'Работа',
];