<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Log;
use App\Owners;
use App\Device;

class Log extends Model
{
	protected $table = 'log';
    
    //Update Log
    public function updateLog($request, $id){
        $log = Log::find($id);
        $log->event = $request->input('event');
        $log->resolved = $request->input('resolved');
        $log->save();
		
		$owner = Owners::find($log->device_id);
		$owner->name = $request->input('name');
		$owner->save();

    	$device = Device::find($log->owners_id);
		$device->type = $request->input('type');
		$device->save();
    }
    
	//Create Log
	public function insertNewLog($request){
		//Save owner
		$owner = new Owners;
		$owner->name = $request->name;
		$owner->save();
	
		//Save device
		$device = new Device;
		$device->type = $request->type;
		$device->save();

	
		//Save log
		$log = new Log;
		$log->event = $request->event;
		$log->resolved = $request->resolved;
		$log->device_id = $device->id;
		$log->owners_id = $owner->id;
		$log->save();

	}

	public function deleteLog($id){
		$log = Log::find($id);
		$log->delete();
	}

	public function deleteOwner($id){
		$log = Owners::find($id);
        $log->delete();
	}

    public function deleteDevice($id){
        $log = Device::find($id);
        $log->delete();
    }
	
	//logs that are resolved
	public function isResolved(){
		return Log::where('resolved', 'yes')->get();

	}

	//Get all Logs with Owner and Device
	public function getAllLogs(){
		 return Log::all(); 
	}


	//get a log and the joind of device and owner
	public function getOneLog($id){
		$id = Log::find($id)->id;
		$log = DB::table('log')
			->join('owners', 'log.owners_id', '=', 'owners.id')
			->join('device', 'log.device_id', '=', 'device.id')
			->select('log.id', 'log.event', 'log.resolved', 'owners.name', 'device.type')
			->where('log.id', '=', $id)
			->get();
		
		return $log;
	}

	//get a device
	public function getDevice($id){
		$device = Device::find($id);
		return $device;
	}

	//get owner
    public function getOwner($id){
        $owners = Owners::find($id);
        return $owners;
    }
	
	//get owners belonging to corresponing log
	public function owners(){
		return $this->belongsTo(Owners::class);
	}

	//get device belonging to corresponding log
    public function device(){
        return $this->belongsTo(Device::class);
    }

}
