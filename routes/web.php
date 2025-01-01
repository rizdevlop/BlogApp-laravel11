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
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserPostController;

Route::get('/', function () {
    return view('welcome');
});

// LOG IN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/profile-admin', [DashboardController::class, 'profileAdminShow'])->name('profile.admin.show');
    Route::post('/update-profile-admin', [DashboardController::class, 'updateAdmin'])->name('update.admin');

    // MANAJEMEN PENGGUNA
    Route::get('/manajemen-pengguna', [UserManagementController::class, 'index'])->name('pengguna.manajemen-pengguna');
    Route::get('/manajemen-pengguna/tambah', [UserManagementController::class, 'create'])->name('pengguna.manajemen-pengguna.tambah');
    Route::post('/manajemen-pengguna', [UserManagementController::class, 'store'])->name('pengguna.manajemen-pengguna.store');
    Route::get('/manajemen-pengguna/{user}/edit', [UserManagementController::class, 'edit'])->name('pengguna.manajemen-pengguna.edit');
    Route::put('/manajemen-pengguna/{user}', [UserManagementController::class, 'update'])->name('pengguna.manajemen-pengguna.update');
    Route::get('/manajemen-pengguna/{user}', [UserManagementController::class, 'show'])->name('pengguna.manajemen-pengguna.show');
    Route::post('/update-status', [UserManagementController::class, 'updateStatus'])->name('update.status');
    Route::get('/export-users', [UserManagementController::class, 'exportUsers']);
    Route::delete('/user-management/{user}', [UserManagementController::class, 'destroy'])->name('pengguna.manajemen-pengguna.destroy');

    // KATEGORI
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // MANAJEMEN POSTS
    Route::get('/post-management', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // PESAN MASUK
    Route::get('/pesan-masuk', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/pesan-masuk/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/export-pesan', [MessageController::class, 'exportMessages'])->name('messages.export');
});

Route::middleware(['auth', 'IsUser'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
    
    Route::get('/posts', [UserPostController::class, 'index'])->name('user.posts.index'); 
    
    Route::get('/posts/{post:slug}', [UserPostController::class, 'show'])->name('user.posts.show');

    Route::get('/authors/{user:username}', [UserPostController::class, 'authorPost'])->name('user.posts.author');
    
    Route::get('/categories/{category:slug}', [UserPostController::class, 'categoryPost'])->name('user.posts.category');
    
    
    Route::get('/profile', [UserController::class, 'profileShow'])->name('profile.show');
    Route::post('/profil/update', [UserController::class, 'update'])->name('profil.update');
    
    Route::get('/artikel-upload', [UserPostController::class, 'indexUpload'])->name('posts.upload');
    Route::post('/artikel', [UserPostController::class, 'store'])->name('artikel.store');

});