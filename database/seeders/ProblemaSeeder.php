<?php

namespace Database\Seeders;

use App\Models\Problema;
use Illuminate\Database\Seeder;

class ProblemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Problema::factory()->count(20)->create();
    }
}
