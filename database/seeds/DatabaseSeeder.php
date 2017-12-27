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
        // $this->call(UsersTableSeeder::class);
        $this->call(user_seed::class);
        $this->call(sensordata_seed::class);
        $this->call(sensors_seed::class);
    }
}
