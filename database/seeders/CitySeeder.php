<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('citys')->insert([
            // Antioquia
            ['name' => 'Medellin', 'id_departament' => '1'],
            ['name' => 'Envigado', 'id_departament' => '1'],
            ['name' => 'Itagui', 'id_departament' => '1'],
            ['name' => 'Bello', 'id_departament' => '1'],
            ['name' => 'Sabaneta', 'id_departament' => '1'],

            // Cundinamarca
            ['name' => 'Bogota', 'id_departament' => '2'],
            ['name' => 'Soacha', 'id_departament' => '2'],
            ['name' => 'Chia', 'id_departament' => '2'],
            ['name' => 'Zipaquira', 'id_departament' => '2'],
            ['name' => 'Fusagasuga', 'id_departament' => '2'],

            // Valle del Cauca
            ['name' => 'Cali', 'id_departament' => '3'],
            ['name' => 'Palmira', 'id_departament' => '3'],
            ['name' => 'Buenaventura', 'id_departament' => '3'],
            ['name' => 'Tulua', 'id_departament' => '3'],
            ['name' => 'Yumbo', 'id_departament' => '3'],

            // Atlantico
            ['name' => 'Barranquilla', 'id_departament' => '4'],
            ['name' => 'Soledad', 'id_departament' => '4'],
            ['name' => 'Malambo', 'id_departament' => '4'],
            ['name' => 'Sabanagrande', 'id_departament' => '4'],
            ['name' => 'Puerto Colombia', 'id_departament' => '4'],

            // Santander
            ['name' => 'Bucaramanga', 'id_departament' => '5'],
            ['name' => 'Floridablanca', 'id_departament' => '5'],
            ['name' => 'Giron', 'id_departament' => '5'],
            ['name' => 'Piedecuesta', 'id_departament' => '5'],
            ['name' => 'Barrancabermeja', 'id_departament' => '5'],

            // Bolivar
            ['name' => 'Cartagena', 'id_departament' => '6'],
            ['name' => 'Turbaco', 'id_departament' => '6'],
            ['name' => 'Magangue', 'id_departament' => '6'],
            ['name' => 'El Carmen de Bolivar', 'id_departament' => '6'],
            ['name' => 'San Juan Nepomuceno', 'id_departament' => '6'],

            // Nariño
            ['name' => 'Pasto', 'id_departament' => '7'],
            ['name' => 'Tumaco', 'id_departament' => '7'],
            ['name' => 'Ipiales', 'id_departament' => '7'],
            ['name' => 'Tuquerres', 'id_departament' => '7'],

            // Cordoba
            ['name' => 'Monteria', 'id_departament' => '8'],
            ['name' => 'Lorica', 'id_departament' => '8'],
            ['name' => 'Sahagun', 'id_departament' => '8'],
            ['name' => 'Tierralta', 'id_departament' => '8'],
            ['name' => 'Cerete', 'id_departament' => '8'],

            // Huila
            ['name' => 'Neiva', 'id_departament' => '9'],
            ['name' => 'Pitalito', 'id_departament' => '9'],
            ['name' => 'Garzon', 'id_departament' => '9'],
            ['name' => 'Campoalegre', 'id_departament' => '9'],
            ['name' => 'La Plata', 'id_departament' => '9'],

            // Tolim
            ['name' => 'Ibague', 'id_departament' => '10'],
            ['name' => 'Espinal', 'id_departament' => '10'],
            ['name' => 'Melgar', 'id_departament' => '10'],
            ['name' => 'Libano', 'id_departament' => '10'],
            ['name' => 'Honda', 'id_departament' => '10'],

        ]);
    }
}
