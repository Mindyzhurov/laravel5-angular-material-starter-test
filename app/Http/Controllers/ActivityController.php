<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Activity;

class ActivityController extends Controller
{
    //

    public function create (Request $request) {

    	$this->validate($request, [
    		'name' => 'required|string'
    	]);

    	$activity = new Activity();
    	$activity->name = $request->input('name');
    	$activity->description = $request->input('description');
    	//$activity->options = $request->input('options');
    	$activity->save();

    	return response()->success(compact('activity'));
    }

    public function index(Request $request) {
    	$rows = Activity::all();
    	return response()->json($rows);
    }

    public function update (Request $request) {

    	$this->validate($request, [
    		'id' => 'required|integer',
    		'name' => 'required|string'
    	]);

    	$activity = Activity::find($request->input('id'));
    	$activity->name = $request->input('name');
    	$activity->description = $request->input('description');
    	//$activity->options = $request->input('options');
    	$activity->save();

    	return response()->success(compact('activity'));
    }

	public function delete (Request $request) {

    	$this->validate($request, [
    		'ids' => 'required'    		
    	]);

    	$ids = $request->input('ids');
    	
    	foreach($ids as $id) {
    		$activity = Activity::find($request->input('id'));
    		$activity->delete();	
    	}   	

    	return response()->json($ids);
    }    
}
