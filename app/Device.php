<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	protected $table = 'device';
    
	//
	public function log(){
        return $this->hasMany(Log::class);
    }

}
