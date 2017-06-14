<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
	#protected $table = 'Owners';

    //Owner can have many logs
	public function logs(){
		return $this->belongsToMany(Log::class);
	}
	
	public function getOwner($id){
		return Owners::find($id);
	}

	public function deleteOwner($id){
		$owner = Owners::find($id);
		$owner = delete();
	}
	
	public function log(){
        return $this->hasMany(Log::class);
    }

}
