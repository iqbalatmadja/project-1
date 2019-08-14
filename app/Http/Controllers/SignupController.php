<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup.index');
    }   
    
    public function processing(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'captcha' => 'required|captcha'
        ]);
        error_log("PASS");
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
}
