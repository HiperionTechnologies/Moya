<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Super Administrador',
        	'email' => 'moya@hotmail.com',
        	'password' => bcrypt('moya123456'),
        ]);

        DB::table('statistics')->insert([
        	'editions' => '21 ediciones (desde 2017)',
        	'brands' => '146 marcas',
        	'customers' => '327,000 clientes',
        	'sales' => '$1,203,040',
        ]);

        DB::table('images')->insert([
        	'name' => 'banner',
        	'title' => 'Ingrese un titulo',
        	'description' => 'Ingrese una descripción',
        	'route' => 'banner.jpg',
        ]);

        DB::table('sedes')->insert([
            'city' => 'Saltillo',
        ]);
    }
}
