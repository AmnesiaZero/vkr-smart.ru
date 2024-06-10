<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateTeacherRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        config('roles.models.role')::create([
            'name' => 'Преподаватель',
            'slug' => 'teacher',
            'description' => 'Преподаватель в организации',
            'level' => 2,
        ]);
    }
}
