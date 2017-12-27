<?php

use Illuminate\Database\Seeder;

class sensordata_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensordata')->insert([
            'sensorID' => 'boven1',
            'sensortype' => 'temperature',
            'sensordata' => 20,
            'batteryPercentage' => 45
        ]);
        DB::table('sensordata')->insert([
            'sensorID' => 'boven3',
            'sensortype' => 'temperature',
            'sensordata' => 67,
            'batteryPercentage' => 23
        ]);
    }
}
