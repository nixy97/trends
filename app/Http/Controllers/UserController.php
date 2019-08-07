<?php

namespace App\Http\Controllers;

use http\Env\Request;

class UserController extends Controller
{
    public function all(){
        return User::with('flag')->get();
    }
    public function delete(){
        /*$user = User::find($user);
        if(!is_null($user)) {
            if($user->delete()){
                return ['status' => 'true'];
            }
        }
        return ['status' => 'false'];
        */
    }
    public function store(){
        return User::create([
            'firstname' => Request::input('firstname'),
            'lastname' => Request::input('lastname'),
            'username' => Request::input('username'),
            'email' => Request::input('email'),
            'password' => Hash::make(Request::input('password'))
        ]);
    }
}
