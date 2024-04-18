<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departaments')->insert([
            ['name' => 'Antioquia'],
            ['name' => 'Cundinamarca'],
            ['name' => 'Valle del Cauca'],
            ['name' => 'Atlantico'],
            ['name' => 'Santander'],
            ['name' => 'Bolivar'],
            ['name' => 'Nariño'],
            ['name' => 'Cordoba'],
            ['name' => 'Huila'],
            ['name' => 'Tolima']
        ]);
    }
}
