<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')
            ->get()
            ->map(function (Message $m) {
                return [
                    'id'         => $m->id,
                    'subject'    => $m->subject,
                    'message'    => $m->message,
                    'created_at' => $m->created_at->format('Y-m-d H:i'),
                ];
            });

        return inertia('uzenetek/index', [
            'messages' => $messages,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        Message::create([
            'user_id' => $request->user()->id,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('messages.index')
            ->with('success', 'Üzeneted sikeresen elküldve!');
    }
}
