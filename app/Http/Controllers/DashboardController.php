<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;

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
}
