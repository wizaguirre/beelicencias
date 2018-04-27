<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(SoftwareTableSeeder::class);
        $this->call(LicencesTableSeeder::class);
        $this->call(TerminalsTableSeeder::class);

    }
}
