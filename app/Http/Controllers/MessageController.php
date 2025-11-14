<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function index()
    {
        return inertia('uzenetek/index');
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

        return back()->with('success', 'Üzeneted sikeresen elküldve!');
    }
}
