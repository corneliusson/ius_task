<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	//Create log table
	Schema::create('log', function (Blueprint $table) {
		$table -> increments('id');
		$table -> string('owner');
		$table -> string('device');
		$table -> string('event');
		$table -> enum('resolved', ['yes', 'no']);
		$table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop log table
	Schema::drop('log');
    }
}
