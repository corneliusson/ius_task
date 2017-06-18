<?php

use Illuminate\Database\Seeder;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create owner
        DB::table('owners')->insert([
            'name' => str_random(10),
			'created_at' => date('Y-m-d H:i:s')
        ]);

    }
}
