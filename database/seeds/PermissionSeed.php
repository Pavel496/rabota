<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'vacancy_access',],
            ['id' => 2, 'title' => 'vacancy_create',],
            ['id' => 3, 'title' => 'vacancy_edit',],
            ['id' => 4, 'title' => 'vacancy_view',],
            ['id' => 5, 'title' => 'vacancy_delete',],
            ['id' => 6, 'title' => 'user_management_access',],
            ['id' => 7, 'title' => 'permission_access',],
            ['id' => 8, 'title' => 'permission_create',],
            ['id' => 9, 'title' => 'permission_edit',],
            ['id' => 10, 'title' => 'permission_view',],
            ['id' => 11, 'title' => 'permission_delete',],
            ['id' => 12, 'title' => 'role_access',],
            ['id' => 13, 'title' => 'role_create',],
            ['id' => 14, 'title' => 'role_edit',],
            ['id' => 15, 'title' => 'role_view',],
            ['id' => 16, 'title' => 'role_delete',],
            ['id' => 17, 'title' => 'user_access',],
            ['id' => 18, 'title' => 'user_create',],
            ['id' => 19, 'title' => 'user_edit',],
            ['id' => 20, 'title' => 'user_view',],
            ['id' => 21, 'title' => 'user_delete',],
            ['id' => 22, 'title' => 'sphere_access',],
            ['id' => 23, 'title' => 'sphere_create',],
            ['id' => 24, 'title' => 'sphere_edit',],
            ['id' => 25, 'title' => 'sphere_view',],
            ['id' => 26, 'title' => 'sphere_delete',],
            ['id' => 27, 'title' => 'schedule_access',],
            ['id' => 28, 'title' => 'schedule_create',],
            ['id' => 29, 'title' => 'schedule_edit',],
            ['id' => 30, 'title' => 'schedule_view',],
            ['id' => 31, 'title' => 'schedule_delete',],
            ['id' => 32, 'title' => 'experience_access',],
            ['id' => 33, 'title' => 'experience_create',],
            ['id' => 34, 'title' => 'experience_edit',],
            ['id' => 35, 'title' => 'experience_view',],
            ['id' => 36, 'title' => 'experience_delete',],
            ['id' => 37, 'title' => 'lasting_access',],
            ['id' => 38, 'title' => 'lasting_create',],
            ['id' => 39, 'title' => 'lasting_edit',],
            ['id' => 40, 'title' => 'lasting_view',],
            ['id' => 41, 'title' => 'lasting_delete',],
            ['id' => 42, 'title' => 'resume_access',],
            ['id' => 43, 'title' => 'resume_create',],
            ['id' => 44, 'title' => 'resume_edit',],
            ['id' => 45, 'title' => 'resume_view',],
            ['id' => 46, 'title' => 'resume_delete',],
            ['id' => 47, 'title' => 'phone_access',],
            ['id' => 48, 'title' => 'phone_create',],
            ['id' => 49, 'title' => 'phone_edit',],
            ['id' => 50, 'title' => 'phone_view',],
            ['id' => 51, 'title' => 'phone_delete',],
            ['id' => 52, 'title' => 'company_access',],
            ['id' => 53, 'title' => 'company_create',],
            ['id' => 54, 'title' => 'company_edit',],
            ['id' => 55, 'title' => 'company_view',],
            ['id' => 56, 'title' => 'company_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
