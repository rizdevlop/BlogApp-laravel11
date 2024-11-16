<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user = auth()->user();

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update data user
        $user->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
