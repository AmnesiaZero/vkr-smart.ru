<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
           'name' => 'nvkuzmichev',
            'password' => bcrypt('00guQbvJlB'),

        ]);
        User::factory()->create([
            'name' => 'apav',
            'password' => bcrypt('YDuuk31nfS'),
            'email' => 'sanekpavlov39@gmail.com'
        ]);
        User::factory()->create([
            'name' => 'marketing',
            'password' => bcrypt('gmopJCfZW9')
        ]);
        User::factory()->create([
            'name' => 'adm',
            'password' => bcrypt('ujQxep0Jsd')
        ]);
    }
}
