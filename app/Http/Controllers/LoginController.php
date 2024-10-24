<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }

    public function register ()
    {
        return view('auth.register');
    }

    public function prosesLogin (Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                Session::flash('status', 'failed');
                Session::flash('message', 'Akun anda sedang tidak aktif. Hubungi admin!');
                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if (Auth::user()->role == 'Admin'){
                return redirect()->route('admin.dashboard');
            };

            if (Auth::user()->role == 'User'){
                return redirect()->route('user.home');
            };
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
        
    }
}
