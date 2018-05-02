<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Walter Izaguirre',
            'email' => 'wizaguirrel@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => '/uploads/avatars/default_avatar.jpg'
        ]);
    }
}
