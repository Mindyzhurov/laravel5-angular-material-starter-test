<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Question;
use App\Theme;
use App\Activity;
use App\Evaluate;
use App\User;

class QuestionController extends Controller
{
    //
    public function create(Request $request) {
    	$this->validate([
    		'problem' => 'required|string'
    	]);

    	$question = new Question();
    	$question->problem = $request->input('problem');
    	$question->options = $request->input('options');
        $question->title = $request->input('title');
    	$question->save();

    	return response()->success(compact('queston'));
    }

    public function update (Request $request) {

        $this->validate($request, [
            'id' => 'required|integer',
            'problem' => 'required|string'
            
        ]);

        $question = Question::find($request->input('id'));
        $question->problem = $request->input('problem');
        $question->options = $request->input('options');
        $question->title = $request->input('title');
        $question->save();

        return response()->success(compact('question'));
    }

    public function delete (Request $request) {

        $this->validate($request, [
            'ids' => 'required'         
        ]);

        $ids = $request->input('ids');
        
        foreach($ids as $id) {
            $question = Group::find($request->input('id'));
            $question->delete();    
        }       

        return response()->json($ids);
    }   


    public function index(Request $request) {   	
        $users = User::all();
        $user = $users[0];

        $activitys = Activity::all();
        $activity = $activitys[0];

        $theme = Theme::where('groupid', '=', $user->groupid)
                        ->where('startat', '=', '2016-05-09') 
                        ->where('activity_id', '=', $activity->id)-> get();

        $progress = Evaluate::where('user_id', '=', $user->id)
                              ->where('theme_id','=', $theme[0]->id)-> get();

        $offset = count($progress);
        
        $questions = Question::where('activity_id', '=', $activity->id)->get();
        
        $ret = [];

        if($offset >= sizeof($questions)){
            $ret = ['success'=>false, 'data'=>"You have done this evaluation"];            
        }else{
            $ret = ['success'=>true, 'data'=>$questions[$offset]];            
        }
    	return response()->json($ret);
    }
}
