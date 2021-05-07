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
            'city'=> 'Girardot', 'state_id'=>'4'
        ],[
            'city'=> 'Bolívar', 'state_id'=>'4'
        ],[
            'city'=> 'Camatagua', 'state_id'=>'4'
        ],[
            'city'=> 'Francisco Linares Alcántara', 'state_id'=>'4'
        ],[
            'city'=> 'José Ángel Lamas', 'state_id'=>'4'
        ],[
            'city'=> 'José Félix Ribas', 'state_id'=>'4'
        ],[
            'city'=> 'José Rafael Revenga', 'state_id'=>'4'
        ],[
            'city'=> 'Libertador', 'state_id'=>'4'
        ],[
            'city'=> 'Mario Briceño Iragorry', 'state_id'=>'4'
        ],[
            'city'=> 'Ocumare de la Costa de Oro', 'state_id'=>'4'
        ],[
            'city'=> 'San Casimiro', 'state_id'=>'4'
        ],[
            'city'=> 'San Sebastián', 'state_id'=>'4'
        ],[
            'city'=> 'Santiago Mariño', 'state_id'=>'4'
        ],[
            'city'=> 'Santos Michelena', 'state_id'=>'4'
        ],[
            'city'=> 'Sucre', 'state_id'=>'4'
        ],[
            'city'=> 'Tovar', 'state_id'=>'4'
        ],[
            'city'=> 'Urdaneta', 'state_id'=>'4'
        ],[
            'city'=> 'Zamora', 'state_id'=>'4'
        ],[
            'city'=> 'Barinas', 'state_id'=>'4'
        ],[
            'city'=> 'Barinas', 'state_id'=>'5'
        ],[
            'city'=> 'Ciudad Bolívar', 'state_id'=>'6'
        ],[
            'city'=> 'Valencia', 'state_id'=>'7'
        ],[
            'city'=> 'San Diego', 'state_id'=>'7'
        ],[
            'city'=> 'Naguanagua', 'state_id'=>'7'
        ],[
            'city'=> 'Bejuma', 'state_id'=>'7'
        ],[
            'city'=> 'Guacara', 'state_id'=>'7'
        ],[
            'city'=> 'Los Guayos', 'state_id'=>'7'
        ],[
            'city'=> 'San Joaquín', 'state_id'=>'7'
        ],[
            'city'=> 'Carlos Arvelo', 'state_id'=>'7'
        ],[
            'city'=> 'Diego Ibarra', 'state_id'=>'7'
        ],[
            'city'=> 'Libertador', 'state_id'=>'7'
        ],[
            'city'=> 'Juan José Mora', 'state_id'=>'7'
        ],[
            'city'=> 'Miranda', 'state_id'=>'7'
        ],[
            'city'=> 'Montalbán', 'state_id'=>'7'
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
            'city'=> 'Acevedo', 'state_id'=>'16'
        ],[
            'city'=> 'Andrés Bello', 'state_id'=>'16'
        ],[
            'city'=> 'Baruta', 'state_id'=>'16'
        ],[
            'city'=> 'Brión', 'state_id'=>'16'
        ],[
            'city'=> 'Bolívar', 'state_id'=>'16'
        ],[
            'city'=> 'Buroz', 'state_id'=>'16'
        ],[
            'city'=> 'Carrizal', 'state_id'=>'16'
        ],[
            'city'=> 'Chacao', 'state_id'=>'16'
        ],[
            'city'=> 'El Hatillo', 'state_id'=>'16'
        ],[
            'city'=> 'Guaicaipuro', 'state_id'=>'16'
        ],[
            'city'=> 'Gual', 'state_id'=>'16'
        ],[
            'city'=> 'Indenpendencia', 'state_id'=>'16'
        ],[
            'city'=> 'Lander', 'state_id'=>'16'
        ],[
            'city'=> 'Los Salias', 'state_id'=>'16'
        ],[
            'city'=> 'Páez', 'state_id'=>'16'
        ],[
            'city'=> 'Paz Castillo', 'state_id'=>'16'
        ],[
            'city'=> 'Plaza', 'state_id'=>'16'
        ],[
            'city'=> 'Sucre', 'state_id'=>'16'
        ],[
            'city'=> 'Urdaneta', 'state_id'=>'16'
        ],[
            'city'=> 'Zamora', 'state_id'=>'16'
        ],[
            'city'=> 'Mérida', 'state_id'=>'16'
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
