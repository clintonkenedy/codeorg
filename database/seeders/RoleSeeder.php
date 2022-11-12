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
        $role2=Role::create(['name'=>'Calificador']);
        //PERMISOS PARA USUARIOS
        Permission::create(['name' => 'usuario.index']);
        Permission::create(['name' => 'usuario.create']);
        Permission::create(['name' => 'usuario.edit']);
        Permission::create(['name' => 'usuario.destroy']);
        //PERMISOS PARA ROLESs
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.destroy']);
        //PERMISOS PARA PUNTUACION
        Permission::create(['name' => 'puntuacion.index']);
        Permission::create(['name' => 'puntuacion.create']);
        Permission::create(['name' => 'puntuacion.edit']);
        Permission::create(['name' => 'puntuacion.destroy']);
        //PERMISOS PARA REENVIAR
        Permission::create(['name' => 'reenviar.index']);
        Permission::create(['name' => 'reenviar.create']);
        Permission::create(['name' => 'reenviar.edit']);
        Permission::create(['name' => 'reenviar.destroy']);
        //PERMISOS PARA CALIFICAR
        Permission::create(['name' => 'calificar.index'])->syncRoles($role2);
        Permission::create(['name' => 'calificar.create'])->syncRoles($role2);;
        Permission::create(['name' => 'calificar.edit'])->syncRoles($role2);;
        Permission::create(['name' => 'calificar.destroy'])->syncRoles($role2);;
        //PERMISOS PARA EQUIPO
        Permission::create(['name' => 'estudiantes.index']);
        Permission::create(['name' => 'estudiantes.create']);
        Permission::create(['name' => 'estudiantes.edit']);
        Permission::create(['name' => 'estudiantes.destroy']);
        //PERMISOS PARA EQUIPO
        Permission::create(['name' => 'equipo.index']);
        Permission::create(['name' => 'equipo.create']);
        Permission::create(['name' => 'equipo.edit']);
        Permission::create(['name' => 'equipo.destroy']);
        //PERMISOS PARA PROBLEMAS
        Permission::create(['name' => 'problemas.index']);
        Permission::create(['name' => 'problemas.create']);
        Permission::create(['name' => 'problemas.edit']);
        Permission::create(['name' => 'problemas.destroy']);
        $permisos = Permission::all();
        $role1->syncPermissions($permisos);

    }
}
