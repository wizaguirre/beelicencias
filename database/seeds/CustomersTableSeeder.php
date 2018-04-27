<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'cedularuc' => 'J0310000006130',
            'name' => 'Constructora Meco, S.A.',
            'contact' => 'Walter Izaguirre',
            'email' => 'wizaguirrel@gmail.com',
            'phone' => '89276816',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
