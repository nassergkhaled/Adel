<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use Illuminate\Http\Request;

class MainAPIController extends Controller
{
    public function fetchChatSessions(Request $request)
    {
        $my_id = $request->user_id;
        $chatSessions = ChatSession::where('user1_id', $my_id)->orWhere('user2_id', $my_id)->get();
        return view('chating.index', compact('chatSessions'));
    }
}
