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
    
}
