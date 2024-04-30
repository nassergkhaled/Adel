<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessageMetadata extends Model
{
    protected $fillable = ['session_id', 'sender_id', 'message_type', 'created_at'];

    public function session()
    {
        return $this->belongsTo(ChatSession::class, 'session_id');
    }
}
