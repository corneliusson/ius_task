<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Owner;

class Owner extends Model
{
	#protected $table = 'Owner';

    //Owner can have many logs/events
	/*
	public function event(){
		return $this-hasMany(Log::class);
	}
	
	public function getOwner($id){
		return Owner::find($id);
	}
	*/
}
