<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Павлов Александр Дмитриевич',
            'login' => 'apav',
            'gender' => 0, //мужчина
            'password' => bcrypt('YDuuk31nfS'),
            'email' => 'sanekpavlov39@gmail.com',
            'organization_id' => 1
        ]);
    }
}
