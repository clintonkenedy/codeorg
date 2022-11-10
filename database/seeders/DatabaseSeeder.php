<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $user=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('administrador'),
        ]);

        $user->assignRole([1]);
        $this->call(ProblemaSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(EstudianteSeeder::class);

    }
}
