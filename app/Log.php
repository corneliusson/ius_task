<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Log;

class Log extends Model
{
	protected $table = 'log';

	#public static function createNewLog($arr){
	
	#}

	//Get all logs
	public function showAllLogs(){
		return Log::all();
	}

	public static function getOneLog($id){
		return Log::find($id);
	}

}
