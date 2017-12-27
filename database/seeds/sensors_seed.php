<?php

use Illuminate\Database\Seeder;

class sensors_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->insert([
            'sensorID' => 'boven1',
            'userID' => 2
        ]);
        DB::table('sensors')->insert([
            'sensorID' => 'boven3',
            'userID' => 2
        ]);
    }
}