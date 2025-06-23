<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'Username or password is incorrect.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
