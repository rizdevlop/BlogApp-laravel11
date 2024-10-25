<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
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

    public function prosesRegist(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buat instance baru dari model User
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'status' => 'inactive', 
            'role' => 'User', 
        ]);

        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Pendaftaran berhasil! Harap tunggu persetujuan admin.');
        return redirect('register')->with('success', 'Pendaftaran berhasil! Harap tunggu persetujuan admin.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect('/login');
    }
}
