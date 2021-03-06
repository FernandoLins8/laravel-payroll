<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            ['description' => 'monthly $', 'type' => 'monthly'],
            ['description' => 'weekly 2 Friday', 'type' => 'weekly'],
            ['description' => 'weekly 4 Friday', 'type' => 'weekly']
        ]);
    }
}
