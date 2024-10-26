<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        // Simpan data ke dalam tabel messages
        Message::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
