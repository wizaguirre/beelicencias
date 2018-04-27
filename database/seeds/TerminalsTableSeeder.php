<?php

use Illuminate\Database\Seeder;

class TerminalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terminals')->insert([
            'name' => 'DELL',
            'key' => '12cb32cb1231cba',
            'lastAccess' => '2018-04-10',
            'licence_id' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
