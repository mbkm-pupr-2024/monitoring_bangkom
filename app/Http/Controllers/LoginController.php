<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        if (session()){
            redirect()->back();
        }
        return view('login');
    }

    public function signin(Request $request)
    {
        
        $request->validate([
            'username' => 'required',
            'password'=> 'required' 
        ]);
        if (Auth::guard('admin')->attempt($request->only('username','password'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success', 'Anda berhasil login');
        }
        else
        {
            return redirect('/login')->with('error', 'Invalid username or password');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // dd(session()->all());
        
        return redirect('/login');
    }

}