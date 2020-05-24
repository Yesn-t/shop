<?php

use App\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create(['name' => 'Man']);
        Departament::create(['name' => 'Woman']);
        Departament::create(['name' => 'Kid']);
    }
}
