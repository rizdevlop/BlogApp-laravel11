<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

// LOG IN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);

// SIGN UP
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegist']);

Route::post('/message', [ContactController::class, 'store'])->name('message.store');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::middleware(['auth', 'IsAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'IsUser'])->group(function () {
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

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});