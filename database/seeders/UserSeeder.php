<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador General',
            'email' => 'admin@admin.com',
            'password' => bcrypt('kabasto123')
        ])->assignRole('Administrador');

        // Supermercados
        User::create([
            'name' => 'Supermarket General',
            'email' => 'supermarket.general@mail.com',
            'password' => bcrypt('seller123')
        ])->assignRole('seller');
        User::create([
            'name' => 'Supermarket Principal',
            'email' => 'supermarket.principal@mail.com',
            'password' => bcrypt('seller123')
        ])->assignRole('seller');
        User::create([
            'name' => 'Supermarket Total',
            'email' => 'supermarket.total@mail.com',
            'password' => bcrypt('seller123')
        ])->assignRole('seller');
        User::create([
            'name' => 'Abasto General',
            'email' => 'abasto.general@mail.com',
            'password' => bcrypt('seller123')
        ])->assignRole('seller');
        User::create([
            'name' => 'Abasto Principal',
            'email' => 'abasto.principal@mail.com',
            'password' => bcrypt('seller123')
        ])->assignRole('seller');
        User::create([
            'name' => 'Abasto Total',
            'email' => 'abasto.total@mail.com',
            'password' => bcrypt('seller123')
        ])->assignRole('seller');
    }
}
