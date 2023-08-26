<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nama';

        $request->merge([$loginType => $request->input('login')]);

        if (Auth::attempt($request->only($loginType, 'password'))) {
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withInput($request->only('login'))->withErrors([
            'login' => 'Email/Nama atau Password salah',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
   
    
    
}

