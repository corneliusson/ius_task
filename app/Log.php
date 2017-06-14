<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
#use Illuminate\Support\Facades\DB;
use App\Log;
use App\Owners;
use App\Device;

class Log extends Model
{
	protected $table = 'log';

	//Get all Logs with Owner and Device
	public function getAllLogs(){
		 return Log::all(); 
	}

	//get a log
	public function getOneLog($id){
		return Log::find($id);
	}

	public function owners(){
		return $this->belongsTo(Owners::class);
	}

    public function device(){
        return $this->belongsTo(Device::class);
    }
	
	public function own(){
		$o = Owners::find(1)->log;
		return $o;
		#return Owners::find(1);
		#echo $ow;
		#$ow = App\Owners::find(1);
		#return $ow->owners->name;
		#$own = Owners::find(1);
		#return $own;
	}
}
