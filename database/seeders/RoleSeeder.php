<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleSeller = Role::create(['name' => 'seller']);
        $roleBuyer = Role::create(['name' => 'buyer']);

        Permission::create(['name' => 'perfil.dashboard'])->syncRoles([$roleAdmin,$roleSeller,$roleBuyer]);
        Permission::create(['name' => 'perfil.perfil'])->syncRoles([$roleAdmin,$roleSeller,$roleBuyer]);

        //permisos de admin
        Permission::create(['name' => 'perfil.usuarios'])->assignRole($roleAdmin);
        Permission::create(['name' => 'perfil.home'])->assignRole($roleAdmin);
        Permission::create(['name' => 'perfil.categorias'])->assignRole($roleAdmin);
        Permission::create(['name' => 'perfil.productos'])->assignRole($roleAdmin);


        //permisos de seller
        Permission::create(['name' => 'perfil.ventas'])->assignRole($roleSeller);
        Permission::create(['name' => 'perfil.items'])->assignRole($roleSeller);
        Permission::create(['name' => 'perfil.blog'])->assignRole($roleSeller);

        //permisos de buyer
        Permission::create(['name' => 'perfil.compras'])->assignRole($roleBuyer);

    }
}




