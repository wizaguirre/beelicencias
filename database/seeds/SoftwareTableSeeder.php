<?php

use Illuminate\Database\Seeder;

class SoftwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('software')->insert([
            'name' => 'BeePOS',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
