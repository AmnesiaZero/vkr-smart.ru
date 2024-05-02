<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InspectorRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        config('roles.models.role')::create([
            'name' => 'Проверяющий организации',
            'slug' => 'inspector',
            'description' => '',
            'level' => 3,
        ]);
    }
}
