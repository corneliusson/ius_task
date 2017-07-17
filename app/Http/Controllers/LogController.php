<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Log;
use App\Device;
use App\Owners;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        echo "<a href='create'>Create log</a><br />";
		echo "<a href='isresolved'>Resolved</a><br />";

        //Get all Logs
		$log = new Log;
		$log_array = $log->getAllLogs();
		foreach($log_array as $l){
			echo "<a href='edit/".$l->id."'><b>id: </b>".$l->id." ";
			echo "<b>Event: </b>".$l->event." ";
			echo "<b>Resolved: </b>".$l->resolved." ";
			echo "<b>Owner: </b>".$l->owners->name." ";
			echo "<b>Device: </b>".$l->device->type." ";
			echo "</a> ";
			echo "<a href='destroy/".$l->id."'> Delete</a><br />";
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
  
        $form = '
        	<form action="store" method="post">
        	Owner:<br />
        	<input type="text" name="name"><br />
            
        	Device:<br />
        	<input type="text" name="type"><br />
            
        	Event:<br />
        	<input type="text" name="event"><br /><br />
            
        	Resolved?:<br />
        	<input type="radio" name="resolved" value="no" checked>No<br />
        	<input type="radio" name="resolved" value="yes"> Yes<br />
        	<input type="submit" value="Submit">
		 
			</form>
        ';

        echo $form;
    }

	//get all resolved logs
	public function isresolved(){
		$log = new Log;
		$log = $log->isResolved();
		foreach($log as $v){
            echo "<b>id: </b>".$v->id. " ";
            echo "<b>Event: </b>".$v->event." ";
            echo "<b>Resolved: </b>".$v->resolved." ";
            echo "<b>Name: </b>".$v->name." ";
            echo "<b>Type: </b>".$v->type." ";
            echo "<br />";
        }
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {  
        $this -> validate($request, array(
                'name' => 'required|max:20',
                'type'=> 'required|max:50',
                'event' => 'required|max:255'
        ));
        $log = new Log;
        $log->insertNewLog($request);
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
        //Edit Log
        $log = new Log;
        $res = $log->getOneLog($id);
        
        foreach($res as $value){
            echo '<form action="/log/update/'.$value->id.'" method="post">';
			echo '<input type="hidden" name="_method" value="PUT">';
			echo '<input type="hidden" name="id" value="'.$value->id.'">';
            echo 'Owner:<br /><input type="text" name="name" value="'.$value->name.'"><br />';
            echo 'Device:<br /><input type="text" name="type" value="'.$value->type.'"><br />';
            echo 'Event:<br /><input type="text" name="event" value="'.$value->event.'"><br /><br />';
            echo 'Resolved?<br />';
            if($value->resolved == 'yes'){
                echo '<input type="radio" name="resolved" value="no" >No<br />';
                echo '<input type="radio" name="resolved" value="yes" checked> Yes<br />';                
            }
            elseif($value->resolved == 'no'){
                echo '<input type="radio" name="resolved" value="no" checked>No<br />';
                echo '<input type="radio" name="resolved" value="yes"> Yes<br />';                
            }
            echo '<input type="submit" value="Submit">';
            echo '</form>';
        }
       
        
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
		

        $this -> validate($request, array(
                'name' => 'required|max:20',
                'type'=> 'required|max:50',
                'event' => 'required|max:255'
        ));

		$log = new Log;
        $log->updateLog($request, $id);
		return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		//Delete Log

        $log = new Log;
        $res = $log->getOneLog($id);

        foreach($res as $value){
            echo '<form action="/log/update/'.$value->id.'" method="post">';
            echo '<input type="hidden" name="_method" value="delete">';
            echo '<input type="hidden" name="id" value="'.$value->id.'">';
            echo 'Event:<br /><input type="text" name="event" value="'.$value->event.'"><br /><br />';
            echo '<input type="submit" value="Submit">';
            echo '</form>';
        }
		$log->deleteLog($id);	
		return redirect()->route('index');

    }
}
