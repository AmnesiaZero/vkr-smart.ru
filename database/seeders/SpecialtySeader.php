<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialty::factory()->create([
            'name' => 'Информатика и вычислительная техника',
            'code' => '01.00.00'
        ]);
        Specialty::factory()->create([
            'name' => 'Программная инженерия',
            'code' => '01.10.00'
        ]);
        Specialty::factory()->create([
            'name' => 'Прикладная физика',
            'code' => '01.20.00'
        ]);
        Specialty::factory()->create([
            'name' => 'Инженерная физика',
            'code' => '01.30.00'
        ]);
        Specialty::factory()->create([
            'name' => 'Прикладная механика',
            'code' => '01.30.00'
        ]);
        Specialty::factory()->create([
            'name' => 'Инженерная механика',
            'code' => '01.40.00'
        ]);
    }
}
