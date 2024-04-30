<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatSession;

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
