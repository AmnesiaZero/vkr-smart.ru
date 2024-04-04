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
        $emails = ['sanek_pavlov03@mail.ru','sanekpavlov39@gmail.ru'];
        foreach ($emails as $email){
            User::factory()->create([
                'email' => $email,
            ]);
        }
    }
}
