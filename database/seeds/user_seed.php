<?php

use Illuminate\Database\Seeder;

class user_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ik',
            'email' => 'ik@gmail.com',
            'password' => bcrypt('secret'),
            'remember_token'=> str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'jij',
            'email' => 'jij@gmail.com',
            'password' => bcrypt('secret'),
            'remember_token'=> str_random(10),
        ]);
    }
}
