<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    public function index() 
    {
        // $posts = Post::with(['author', 'category'])->latest()->get(); LAZY LOADING & EAGER LOADING
    
        $posts = Post::with(['author', 'category'])->latest()->get();
        return view('user.posts', ['title' => 'Blog', 'posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('user.post', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }

    public function authorPost(User $user)
    {
        return view('user.posts', [
            'title' => count($user->posts) . ' Articles by ' . $user->name,
            'posts' => $user->posts
        ]);
    }

    public function categoryPost(Category $category)
    {
        return view('user.posts', [
            'title' => 'Articles in: ' . $category->name,
            'posts' => $category->posts
        ]);
    }
}
