<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DaysWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days_weeks')->insert([[
            'day'=> 'lunes',
        ],[
            'day'=> 'martes',
        ],[
            'day'=> 'miercoles',
        ],[
            'day'=> 'jueves',
        ],[
            'day'=> 'viernes',
        ],[
            'day'=> 'sabado',
        ],[
            'day'=> 'domingo',
        ]
        ]);
    }
}
