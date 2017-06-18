<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        //Get all Logs
		$log = new Log;
		$log_array = $log->getAllLogs();
		foreach($log_array as $l){
			echo "<b>id: </b>".$l->id." ";
			echo "<b>Event: </b>".$l->event." ";
			echo "<b>Resolved: </b>".$l->resolved." ";
			echo "<b>Owner: </b>".$l->owners->name." ";
			echo "<b>Device: </b>".$l->device->type." ";
			echo "<br />";
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	//creating a new log
    public function create()
    {
        $form = "<form action='store' method='post'>";
        $form .= "Event:<br />";
        $form .= "<input type='text' name='event'><br /><br />";
        $form .= "<input type='hidden' name='resolved' value='no'>";
        $form .= "<input type='submit' value='Submit'>";
        $form .= "</form>";
        echo $form;
    }

	//get all resolved logs
	public function isresolved(){
		$log = new Log;
		return $log->isResolved();

	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
     
        //Validate, store, redirect
        $this -> validate($request, array(
            'event' => 'required|max:100',
            #'resolved' => 'required|max:10'
        ));
       
        
        $log = new Log;
        //$log->owners_id = $owners->id;
        //$log->device_id = $device->id;
        #$log->owners_id = $owners->id;
        #$log->device_id = $device->id;   
        $log->event = $request->event;
        #$log->resolved = $request->resolved;
        $log->save();
        
		//$log = new Log;
        //$log->createLog();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	//get owner
	public function get_owner($id){
		$log = new Log;
		$res = $log->getOwner($id);
		return $res;
	}

	//get device
	public function get_device($id){
		$log = new Log;
		$res = $log->getDevice($id);
		return $res;
	}  
 
	public function get($id)
    {
        //Show a log
		$log = new Log;
		$res = $log->getOneLog($id);
		
		foreach($res as $v){
			echo "<b>id: </b>".$v->id. " ";
			echo "<b>Event: </b>".$v->event." ";
			echo "<b>Resolved: </b>".$v->resolved." ";
			echo "<b>Name: </b>".$v->name." ";
			echo "<b>Type: </b>".$v->type." ";
			echo "<br />";
		}
				

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     	//
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete a log
		$log = new Log;
		$log->deleteLog();
    }
}
