<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request){
        $incomingFields = $request->validate([
            'login-name' => 'required',
            'login-password' => 'required'
        ]);

        if(auth()->attempt(['name' => $incomingFields['login-name'], 'password' => $incomingFields['login-password']])){
            $request->session()->regenerate();
        }

        return redirect('/home');
    }



    public function logout(){
        auth()->logout();
        return redirect('/login-page                                                                              ');
    }


    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => ['required']
        ]);
    
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
    
    
        return redirect('/home');
    }
}
