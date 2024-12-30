<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index ()
    {
        $categoryCount = Category::count();
        $userCount = User::count();
        $messageCount = Message::count();
        $postCount = Post::count();
        
        return view('admin.dashboard', [
            'user_count' => $userCount,
            'category_count' => $categoryCount,
            'message_count' => $messageCount,
            'post_count' => $postCount,
        ]);
    }

    public function profileAdminShow(User $user)
    {
        $user = auth()->user();

        return view('admin.profile', compact('user'))->with('title', 'Profile Saya');
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

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
