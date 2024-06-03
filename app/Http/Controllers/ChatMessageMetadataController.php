<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use Illuminate\Http\Request;
use App\Models\ChatMessageMetadata;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\FirebaseException;

class ChatMessageMetadataController extends Controller
{

    protected $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withDatabaseUri(config('firebase.database_url'));

        $this->database = $factory->createDatabase(); // Correct method to instantiate Firebase
    }

    public function index()
    {
        return ChatMessageMetadata::all();
    }

    public function sendMessage(Request $request)
    {
        $user = $request->user();

        $belongToMe = ChatSession::where('id', $request->session_id)
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
            ->first();
        if ($belongToMe) {
            $messagesRef = $this->database->getReference('chat_sessions/' . $request->session_id . '/messages');
            $message = $messagesRef->push([

                'content' => $request->input('message'),
                'sender_id' => $user->id,
                'timestamp' => now()->toISOString(),
            ]);

            $message = ChatMessageMetadata::create($request->all());

            return response()->json($message, 201);
        } else {
            return response()->json(['error' => 'You are not part of this chat session'], 401);
        }
    }

    public function fetchMessages($sessionId)
    {
        $messagesRef = $this->database->getReference('chat_sessions/' . $sessionId . '/messages');
        $messages = $messagesRef->getValue();
        return response()->json($messages);
    }

    public function show($id)
    {
        return ChatMessageMetadata::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $message = ChatMessageMetadata::findOrFail($id);
        $message->update($request->all());
        return response()->json($message, 200);
    }

    public function destroy($id)
    {
        ChatMessageMetadata::destroy($id);
        return response()->json(null, 204);
    }
}
