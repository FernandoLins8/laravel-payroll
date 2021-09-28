<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            ['description' => 'Check sent by mail'], 
            ['description' => 'Check given in person',], 
            ['description' => 'Bank account deposit']
        ]);
    }
}
