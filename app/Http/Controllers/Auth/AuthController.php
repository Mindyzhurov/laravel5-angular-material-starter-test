<?php

namespace App\Http\Controllers\Auth;

use Auth;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');
        //$credentials->active = 1;

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->error('Invalid credentials', 401);
            }
        } catch (\JWTException $e) {
            return response()->error('Could not create token', 500);
        }

        $user = Auth::user();

        return response()->success(compact('user', 'token'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|min:3',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:8',
        ]);

        //$groupid = App\Group::all();        

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim(strtolower($request->email));
        $user->password = bcrypt($request->password);
        $user->groupid = 1;        
        //$user->save();

        $token = JWTAuth::fromUser($user);

        $user->remember_token = $token;
        $user->save();

        Mail::send('mails.test', array('name' => $token), function($message) {
            $message->to('sunset1115@yahoo.com', 'sunset')
                ->subject('Verify you email address');
        });

        Flash::message('Thanks for signing up! Please check your email');        

        return response()->success(compact('user', 'token'));
    }
}