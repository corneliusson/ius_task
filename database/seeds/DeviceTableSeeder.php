<?php

use Illuminate\Database\Seeder;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create device
        DB::table('device')->insert([
            'type' => str_random(10),
			'created_at' => date('Y-m-d H:i:s')
        ]);

    }
	
}


