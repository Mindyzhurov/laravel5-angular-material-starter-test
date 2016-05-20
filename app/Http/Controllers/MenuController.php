<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    //
    public function getStatus(Request $request) {
    	
    	$options = $request->input('option');

    	$menu = [
    		[ 'url' => 'login', 'name' => 'Login' ],
    		[ 'url' => 'register', 'name' => 'Sign Up' ]
    	];

    	/*if($options == "logged")
    		array_push($menu, [ 'url' => 'evaluate', 'name' => 'Evaluate' ]);*/

    	return response()->json($menu);
    }
}
