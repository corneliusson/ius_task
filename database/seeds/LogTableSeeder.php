<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Log
        DB::table('log')->insert([
            'event' => str_random(20),
            'resolved' => 'no',
			'device_id' => 2,
			'owners_id' => 1,
			'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
