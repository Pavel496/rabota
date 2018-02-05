<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

Route::group(['middleware' => ['auth', 'approved'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('vacancies', 'Admin\VacanciesController');
    Route::post('vacancies_mass_destroy', ['uses' => 'Admin\VacanciesController@massDestroy', 'as' => 'vacancies.mass_destroy']);
    Route::post('vacancies_restore/{id}', ['uses' => 'Admin\VacanciesController@restore', 'as' => 'vacancies.restore']);
    Route::delete('vacancies_perma_del/{id}', ['uses' => 'Admin\VacanciesController@perma_del', 'as' => 'vacancies.perma_del']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('resumes', 'Admin\ResumesController');
    Route::post('resumes_mass_destroy', ['uses' => 'Admin\ResumesController@massDestroy', 'as' => 'resumes.mass_destroy']);
    Route::post('resumes_restore/{id}', ['uses' => 'Admin\ResumesController@restore', 'as' => 'resumes.restore']);
    Route::delete('resumes_perma_del/{id}', ['uses' => 'Admin\ResumesController@perma_del', 'as' => 'resumes.perma_del']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('spheres', 'Admin\SpheresController');
    Route::post('spheres_mass_destroy', ['uses' => 'Admin\SpheresController@massDestroy', 'as' => 'spheres.mass_destroy']);
    Route::post('spheres_restore/{id}', ['uses' => 'Admin\SpheresController@restore', 'as' => 'spheres.restore']);
    Route::delete('spheres_perma_del/{id}', ['uses' => 'Admin\SpheresController@perma_del', 'as' => 'spheres.perma_del']);
    Route::resource('schedules', 'Admin\SchedulesController');
    Route::post('schedules_mass_destroy', ['uses' => 'Admin\SchedulesController@massDestroy', 'as' => 'schedules.mass_destroy']);
    Route::post('schedules_restore/{id}', ['uses' => 'Admin\SchedulesController@restore', 'as' => 'schedules.restore']);
    Route::delete('schedules_perma_del/{id}', ['uses' => 'Admin\SchedulesController@perma_del', 'as' => 'schedules.perma_del']);
    Route::resource('experiences', 'Admin\ExperiencesController');
    Route::post('experiences_mass_destroy', ['uses' => 'Admin\ExperiencesController@massDestroy', 'as' => 'experiences.mass_destroy']);
    Route::post('experiences_restore/{id}', ['uses' => 'Admin\ExperiencesController@restore', 'as' => 'experiences.restore']);
    Route::delete('experiences_perma_del/{id}', ['uses' => 'Admin\ExperiencesController@perma_del', 'as' => 'experiences.perma_del']);
    Route::resource('lastings', 'Admin\LastingsController');
    Route::post('lastings_mass_destroy', ['uses' => 'Admin\LastingsController@massDestroy', 'as' => 'lastings.mass_destroy']);
    Route::post('lastings_restore/{id}', ['uses' => 'Admin\LastingsController@restore', 'as' => 'lastings.restore']);
    Route::delete('lastings_perma_del/{id}', ['uses' => 'Admin\LastingsController@perma_del', 'as' => 'lastings.perma_del']);
    Route::resource('phones', 'Admin\PhonesController');
    Route::post('phones_mass_destroy', ['uses' => 'Admin\PhonesController@massDestroy', 'as' => 'phones.mass_destroy']);
    Route::post('phones_restore/{id}', ['uses' => 'Admin\PhonesController@restore', 'as' => 'phones.restore']);
    Route::delete('phones_perma_del/{id}', ['uses' => 'Admin\PhonesController@perma_del', 'as' => 'phones.perma_del']);
    Route::resource('companies', 'Admin\CompaniesController');
    Route::post('companies_mass_destroy', ['uses' => 'Admin\CompaniesController@massDestroy', 'as' => 'companies.mass_destroy']);
    Route::post('companies_restore/{id}', ['uses' => 'Admin\CompaniesController@restore', 'as' => 'companies.restore']);
    Route::delete('companies_perma_del/{id}', ['uses' => 'Admin\CompaniesController@perma_del', 'as' => 'companies.perma_del']);



 
});
