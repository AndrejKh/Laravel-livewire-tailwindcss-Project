<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([[
            'city'=> 'Puerto Ayacucho', 'state_id'=>'1'
        ],[
            'city'=> 'Barcelona','state_id'=>'2'
        ],[
            'city'=> 'San Fernando de Apure', 'state_id'=>'3'
        ],[
            'city'=> 'Maracay', 'state_id'=>'4'
        ],[
            'city'=> 'Barinas', 'state_id'=>'5'
        ],[
            'city'=> 'Ciudad Bolívar', 'state_id'=>'6'
        ],[
            'city'=> 'Valencia', 'state_id'=>'7'
        ],[
            'city'=> 'San Carlos', 'state_id'=>'8'
        ],[
            'city'=> 'Tucupita', 'state_id'=>'9'
        ],[
            'city'=> 'Caracas', 'state_id'=>'10'
        ],[
            'city'=> 'Coro', 'state_id'=>'11'
        ],[
            'city'=> 'San Juan de Los Morros', 'state_id'=>'12'
        ],[
            'city'=> 'La Guaira', 'state_id'=>'13'
        ],[
            'city'=> 'Barquisimeto', 'state_id'=>'14'
        ],[
            'city'=> 'Mérida', 'state_id'=>'15'
        ],[
            'city'=> 'Los Teques', 'state_id'=>'16'
        ],[
            'city'=> 'Maturín', 'state_id'=>'17'
        ],[
            'city'=> 'La Asunción', 'state_id'=>'18'
        ],[
            'city'=> 'Guanare', 'state_id'=>'19'
        ],[
            'city'=> 'Cumaná', 'state_id'=>'20'
        ],[
            'city'=> 'San Cristóbal', 'state_id'=>'21'
        ],[
            'city'=> 'Trujillo', 'state_id'=>'22'
        ],[
            'city'=> 'San Felipe', 'state_id'=>'23'
        ],[
            'city'=> 'Maracaibo', 'state_id'=>'24'
        ]]);
    }
}
