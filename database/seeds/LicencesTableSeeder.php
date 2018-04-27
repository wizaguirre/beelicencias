<?php

use Illuminate\Database\Seeder;

class LicencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('licences')->insert([
            'started_date' => '2018-04-01',
            'due_date' => '2018-04-30',
            'status' => 1,
            'quantity' => 10,
            'customer_id' => 1,
            'software_id' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
