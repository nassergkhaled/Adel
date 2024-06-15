<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatSession;
use App\Models\Client;
use App\Models\User;

class ChatSessionController extends Controller
{
    public function index()
    {
        return ChatSession::all();
    }

    public function store(Request $request)
    {
        $session = ChatSession::create($request->all());
        return response()->json($session, 201);
    }

    public function newClientSission(Request $request)
    {
        $user1_id = $request->user_id;

        if ($request->role == "Lawyer")
            $user2_id = Client::where('phone_number', $request->data)->first()->user_id;
        elseif ($request->role == "Client") //No Securety //We Should change it
            $user2_id = $request->data;



        $data = [
            'user1_id' => $user1_id,
            'user2_id' => $user2_id,
        ];

        $session = ChatSession::createOrFirst($data);

        return response()->json($session->id, 201);
    }

    public function show($id)
    {
        return ChatSession::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $session = ChatSession::findOrFail($id);
        $session->update($request->all());
        return response()->json($session, 200);
    }

    public function destroy($id)
    {
        ChatSession::destroy($id);
        return response()->json(null, 204);
    }
}
