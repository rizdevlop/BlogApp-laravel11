<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get(); 
        return view('admin.pesan-masuk', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function exportMessages()
    {
        $messages = Message::all();
        $no = 1;

        (new FastExcel($messages))->export('data-messages.xlsx', function ($message) use (&$no) {
            return [
                'No' => $no++,
                'Nama' => $message->name,
                'Email' => $message->email,
                'Telepon' => $message->phone,
                'Pesan' => $message->message,
                'Dibuat Pada' => $message->created_at,
            ];
        });

        return response()->download('data-messages.xlsx')->deleteFileAfterSend();
    }
}
