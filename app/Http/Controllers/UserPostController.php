<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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

    public function indexUpload()
    {
        $categories = Category::all(); 
        return view('user.upload', [
            'title' => 'Buat Artikel',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
        ]);

        Post::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']), 
            'author_id' => auth()->id(), 
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('posts.upload')->with('success', 'Artikel berhasil dibuat!');
    }
}
