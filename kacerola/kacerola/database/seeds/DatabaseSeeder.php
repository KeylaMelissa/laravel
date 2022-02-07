<?php

use App\ubigeo\Departamento;
use App\ubigeo\Distrito;
use App\ubigeo\Pais;
use App\ubigeo\Provincia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Pais::truncate();
        Provincia::truncate();
        Departamento::truncate();
        Distrito::truncate();
        // $this->call(UserSeeder::class);
    }
}
