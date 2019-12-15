<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat\MessageCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chat\Message;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function messages(Message $message)
    {
        $messages = $message->with('user')
                                ->orderBy('id', 'DESC')
                                ->limit(50)
                                ->latest()
                                ->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $message = $user->messages()->create([
            'body' => $request->body,
        ]);

        $message['user'] = $user;

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message, 201);
    }
}
