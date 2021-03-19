<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([[
            'state'=> 'Amazonas',
        ],[
            'state'=> 'Anzoátegui',
        ],[
            'state'=> 'Apure',
        ],[
            'state'=> 'Aragua',
        ],[
            'state'=> 'Barinas',
        ],[
            'state'=> 'Bolívar',
        ],[
            'state'=> 'Carabobo',
        ],[
            'state'=> 'Cojedes',
        ],[
            'state'=> 'Delta Amacuro',
        ],[
            'state'=> 'Distrito Capital',
        ],[
            'state'=> 'Falcón',
        ],[
            'state'=> 'Guárico',
        ],[
            'state'=> 'La Guaira',
        ],[
            'state'=> 'Lara',
        ],[
            'state'=> 'Mérida',
        ],[
            'state'=> 'Miranda',
        ],[
            'state'=> 'Monagas',
        ],[
            'state'=> 'Nueva Esparta',
        ],[
            'state'=> 'Portuguesa',
        ],[
            'state'=> 'Sucre',
        ],[
            'state'=> 'Táchira',
        ],[
            'state'=> 'Trujillo',
        ],[
            'state'=> 'Yaracuy',
        ],[
            'state'=> 'Zulia',
        ]]);
    }
}
