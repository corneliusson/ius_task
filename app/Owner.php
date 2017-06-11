<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //Owner can have many logs/events
	public function event(){
		return $this-hasMany(Log::class);
	}
}
