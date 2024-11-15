<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pengguna.manajemen-pengguna', compact('users'));
    }
    
    public function exportUsers()
    {

        $users = User::all();
        $no = 1;

        (new FastExcel($users))->export('data-users.xlsx', function ($user) use (&$no) {
            return [
                'No' => $no++,
                'Nama' => $user->name,
                'Username' => $user->username,
                'Email' => $user->email,             
                'Role' => $user->role,
                'Status' => $user->status,
            ];
        });

        return response()->download('data-users.xlsx')->deleteFileAfterSend();
    }

    public function show(User $user)
    {
        return view('pengguna.manajemen-pengguna-show', compact('user'));
    }

    public function create()
    {
        return view('pengguna.manajemen-pengguna-create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required|max:255',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username tidak boleh lebih dari :max karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'role.required' => 'Role wajib diisi.',
            'role.max' => 'Role tidak boleh lebih dari :max karakter.',
        ]);

        $validatedData['status'] = 'active';
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return response()->json(['message' => 'Pengguna berhasil ditambah!'], 200);
    }
    
    public function edit(User $user)
    {
        return view('pengguna.manajemen-pengguna-edit', compact('user'));
    }
    

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|max:255',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username tidak boleh lebih dari :max karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'role.required' => 'Role wajib diisi.',
            'role.max' => 'Role tidak boleh lebih dari :max karakter.',
        ]);

        $user->update($validatedData);

        return response()->json(['message' => 'Pengguna berhasil diedit!'], 200);
    }

    public function updateStatus(Request $request)
    {
        $userId = $request->input('userId');
        $status = $request->input('status'); // Ambil status dari request
    
        $user = User::findOrFail($userId);
        $user->status = $status; // Simpan status baru
        $user->save();
    
        return response()->json(['success' => true]);
    }

    public function destroy(User $user)
{
    // Cek apakah user yang akan dihapus adalah user yang sedang login atau admin
    if ($user->id === auth()->id()) {
        return response()->json(['error' => 'Tidak dapat menghapus akun yang sedang digunakan!'], 400);
    }

    $user->delete(); // Hapus pengguna
    return response()->json(['success' => 'Pengguna berhasil dihapus!'], 200);
}

}
