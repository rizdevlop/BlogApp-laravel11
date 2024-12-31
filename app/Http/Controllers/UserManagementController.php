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
                'Pekerjaan' => $user->pekerjaan,
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
            'pekerjaan' => 'required|max:255',
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
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'pekerjaan.max' => 'Pekerjaan tidak boleh lebih dari :max karakter.',
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
            'name' => 'nullable|max:255', // Tidak wajib diisi
            'username' => 'nullable|max:255|unique:users,username,' . $user->id,
            'email' => 'nullable|email|unique:users,email,' . $user->id, 
            'role' => 'nullable|max:255',
            'pekerjaan' => 'nullable|max:255',
        ], [
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'username.max' => 'Username tidak boleh lebih dari :max karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'role.max' => 'Role tidak boleh lebih dari :max karakter.',
            'pekerjaan.max' => 'Pekerjaan tidak boleh lebih dari :max karakter.',
        ]);
    
        // Update hanya kolom yang ada di request
        $user->update(array_filter($validatedData));
    
        return response()->json(['message' => 'Pengguna berhasil diperbarui!'], 200);
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
        // Cek apakah user yang akan dihapus adalah user yang sedang login
        if ($user->id === auth()->id()) {
            return response()->json(['error' => 'Tidak dapat menghapus akun yang sedang digunakan!'], 400);
        }
    
        // Hapus user, postingan terkait akan otomatis terhapus karena onDelete('cascade')
        $user->delete();
    
        return response()->json(['success' => 'Pengguna dan data terkait berhasil dihapus!'], 200);
    }    
}
