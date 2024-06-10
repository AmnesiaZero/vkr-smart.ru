<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SetAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->where('login', '=', 'apav')->first();
        $role = config('roles.models.role')::where('name', '=',
            'Admin')->first();  //choose the default role upon user creation.
        $user->attachRole($role);
    }
}
