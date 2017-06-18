<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Log;
use App\Owners;

class Owners extends Model
{

    //Owner can have many logs
	public function log(){
		return $this->belongsToMany(Log::class);
	}
	
	//
	#public
	
	public function getOwner($id){
		return Owners::find($id);
	}

	public function deleteOwner($id){
		$owner = Owners::find($id);
		$owner = delete();
	}
/*	
	public function log(){
        return $this->hasMany(Log::class);
    }
*/
}
