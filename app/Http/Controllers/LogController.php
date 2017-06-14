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
    public function create()
    {
		return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$log = new Log;
		$log->event = $request->event;
		$log->resloved = $request->resolved;
        #$log_values = array("event" => "Some new event", "resolved" => "no", "name" => "Kalle", "type" => "Mac");
        #$log->createNewLog($log_values);
		$log->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
	public function get($id)
    {
        //Show a log
		$log = new Log;
		#return $log->getOneLog($id);
		$log_array = $log->getOneLog($id);
		echo $log_array;
		#foreach($log_array as $l){
		#	echo "<b>id: </b>".$l->id." ";
		#	echo "<b>Owner: </b>".$l->owners->name." ";
        #    echo "<b>Device: </b>".$l->device->type." ";

		#}
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
        //
    }
}
