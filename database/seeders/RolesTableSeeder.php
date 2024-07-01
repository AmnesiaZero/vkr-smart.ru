<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::debug('Вошёл в roles seeder');

        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name' => 'Администратор организации',
                'slug' => 'admin',
                'description' => 'Admin Role',
                'level' => 5,
            ],
            [
                'name' => 'Пользователь',
                'slug' => 'user',
                'description' => 'User Role',
                'level' => 1,
            ],
            [
                'name' => 'Сотрудник организации',
                'slug' => 'employee',
                'description' => 'Employee Role',
                'level' => 2,
            ],
            [
                'name' => 'Unverified',
                'slug' => 'unverified',
                'description' => 'Unverified Role',
                'level' => 0,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name' => $RoleItem['name'],
                    'slug' => $RoleItem['slug'],
                    'description' => $RoleItem['description'],
                    'level' => $RoleItem['level'],
                ]);
            }
        }
        Log::debug('Вышел из roles seeder');

    }
}
