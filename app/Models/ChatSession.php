<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class ChatSession extends Model
{
    protected $fillable = ['user1_id', 'user2_id'];

    // Choose the pattern for your chat session ID here
    protected static $idPattern = 'timestamp'; // Options: 'uuid', 'alphanumeric', 'timestamp'

    // Set the primary key type to string if you are using non-integer IDs
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = static::generateChatSessionId();
            }
        });
    }

    protected static function generateChatSessionId()
    {
        switch (static::$idPattern) {
            case 'uuid':
                return (string) Str::uuid();

            case 'alphanumeric':
                return Str::random(12);

            case 'timestamp':
            default:
                $timestamp = now()->format('YmdHisv');
                $randomString = Str::random(6);
                return $timestamp . '-' . $randomString;
        }
    }
    public function messages()
    {
        return $this->hasMany(ChatMessageMetadata::class, 'session_id');
    }
}
