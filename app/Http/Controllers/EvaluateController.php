<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Theme;
use App\User;
use App\Question;
use App\Evaluate;

class EvaluateController extends Controller
{
    //
    public function create(Request $request) {
    	
    	$users = User::all();
        $user = $users[0];

        $question = Question::find($request->input('question_id'));
        $activity_id = $question->activity_id;

        $theme = Theme::where('groupid', '=', $user->groupid)
                        ->where('startat', '=', '2016-05-09') 
                        ->where('activity_id', '=', $activity_id)-> get();

    	$evaluate = new Evaluate();
    	$evaluate->user_id = $user->id;
    	$evaluate->question_id = $request->input('question_id');
    	$evaluate->answer = $request->input('answer');
    	$evaluate->theme_id = $theme[0]->id;
    	$evaluate->save();

    	return response()->success(compact('evaluate'));
    }
}
