<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::where('receiver_id', Auth::id())
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'subject'     => 'required|string|max:255',
            'body'        => 'required|string'
        ]);

        Message::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'subject'     => $request->subject,
            'body'        => $request->body
        ]);

        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dikirim!');
    }

    public function show(Message $message)
    {
        if ($message->receiver_id !== Auth::id()) {
            abort(403);
        }

        $message->update(['is_read' => true]);
        return view('messages.show', compact('message'));
    }

    /* Fungsi delete sudah tersedia */
    public function destroy(Message $message)
    {
        if ($message->receiver_id !== Auth::id()) {
            abort(403);
        }

        $message->delete();

        return redirect()->route('messages.index')
                         ->with('success', 'Pesan berhasil dihapus.');
    }
}