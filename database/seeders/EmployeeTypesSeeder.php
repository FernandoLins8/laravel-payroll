<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert([
            ['description' => 'Salaried'], 
            ['description' => 'Commissioned',], 
            ['description' => 'Hourly']
        ]);
    }
}
