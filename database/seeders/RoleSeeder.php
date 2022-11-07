<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Entrenador']);
        //PERMISOS PARA USUARIOS
        Permission::create(['name' => 'usario.index']);
        Permission::create(['name' => 'usario.create']);
        Permission::create(['name' => 'usario.edit']);
        Permission::create(['name' => 'usario.destroy']);
        //PERMISOS PARA PROBLEMAS
        Permission::create(['name' => 'problemas.index']);
        Permission::create(['name' => 'problemas.create']);
        Permission::create(['name' => 'problemas.edit']);
        Permission::create(['name' => 'problemas.destroy']);
        $permisos = Permission::all();
        $role1->syncPermissions($permisos);
    }
}
