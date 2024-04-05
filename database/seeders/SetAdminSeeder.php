<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::getByEmail('sanekpavlov39@gmail.com');
        $role = config('roles.models.role')::where('name', '=', 'Admin')->first();  //choose the default role upon user creation.
        $user->attachRole($role);
    }
}
