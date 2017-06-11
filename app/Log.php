<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
#use Illuminate\Support\Facades\DB;
use App\Log;

class Log extends Model
{
	protected $table = 'log';

    //
	#public function owner(){
	#	return $this->hasMany('App\Owner');
	#}

	#public function getall(){
	#	return "hej";
	#	return $this -> DB::table('log')->get();	
	#}
	
	public function showAllLogs(){
		#$log = Log::all();
		return $this->hasMany('App\Device');
	}

	public static function getOneLog($id){
		$log = Log::find($id);
		return $log;
	}

}
