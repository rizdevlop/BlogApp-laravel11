<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user-management.users', compact('users'));
    }
    

    public function create()
    {
        return view('admin.user-management.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:Admin,User',
            'status' => 'required|in:active,inactive'
        ]);
    
        User::create($request->all());
        return redirect()->route('admin.user-management.users')->with('success', 'User created successfully');
    }
    

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    
    
    public function edit(User $user)
    {
        return view('admin.user-management.edit', compact('user'));
    }
    

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:Admin,User',
            'status' => 'required|in:active,inactive'
        ]);
    
        $user->update($request->all());
        return redirect()->route('admin.user-management.users')->with('success', 'User updated successfully');
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user-management.users')->with('success', 'User deleted successfully');
    }
}
