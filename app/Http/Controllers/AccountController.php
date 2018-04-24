<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */
    public function login_form() {
        return view('auth.login');
    }
    public function login(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended($request->get('return_to', '/'));
        }
        else return redirect()->back()->withInput()->with('error_msg', 'Email or password is incorrect');
    }
}
