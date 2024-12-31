<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function home ()
    {
        return view('user.home');
    }

    public function profileShow(User $user)
    {
        $user = auth()->user();

        return view('user.profile', compact('user'))->with('title', 'Profile Saya');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->pekerjaan = $request->pekerjaan;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            $photoName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('profile_user'), $photoName);
            $user->profile_photo = $photoName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
