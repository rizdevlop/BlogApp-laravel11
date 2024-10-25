<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

// LOG IN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'prosesLogin']);

// SIGN UP
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'prosesRegist']);

Route::middleware(['auth', 'IsAdmin'])->group(function () {
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
    
    Route::get('/posts', function () {
        // $posts = Post::with(['author', 'category'])->latest()->get(); LAZY LOADING & EAGER LOADING
    
        $posts = Post::latest()->get();
        return view('user.posts', ['title' => 'Blog', 'posts' => $posts]);
    });
    
    Route::get('/posts/{post:slug}', function (Post $post) {
    
        return view('user.post', ['title' => 'Single Post', 'post' => $post]);
    });
    
    Route::get('/authors/{user:username}', function (User $user) {
        // $posts = $user->posts->load('category', 'author'); LAZY LOADING & EAGER LOADING
    
        return view('user.posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
    });
    
    Route::get('/categories/{category:slug}', function (Category $category) {
        // $posts = $category->posts->load('category', 'author');  LAZY LOADING & EAGER LOADING
    
        return view('user.posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
    });
    
    Route::get('/profile', [UserController::class, 'profileShow'])->name('profile.show');
    
    Route::get('/upload', function () {
        return view('user.upload', ['title' => 'Upload Article']);
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});