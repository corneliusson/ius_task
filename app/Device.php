<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Log;

class Device extends Model
{
	protected $table = 'device';
    
	//

	public function log(){
        return $this->hasMany(Log::class);
    }
	  
}
