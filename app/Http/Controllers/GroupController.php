<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Group;

class GroupController extends Controller
{
    //

	public function create(Request $request) {
		$this->validate($request, [
    		'name' => 'required'
    	]);

    	$group = new Group();
    	$group->name = $request->input('name');
    	$group->description = $request->input('description');
    	$group->options = $request->input('options');
    	$group->save();

    	return response()->success(compact('group'));
	}

    public function update (Request $request) {

        $this->validate($request, [
            'id' => 'required|integer',
            'name' => 'required'
        ]);

        $group = Group::find($request->input('id'));
        $group->name = $request->input('name');
        $group->save();

        return response()->success(compact('group'));
    }

    public function delete (Request $request) {

        $this->validate($request, [
            'ids' => 'required'         
        ]);

        $ids = $request->input('ids');
        
        foreach($ids as $id) {
            $group = Group::find($request->input('id'));
            $group->delete();    
        }       

        return response()->json($ids);
    }    

}
