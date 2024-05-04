<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientOffice extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'office_id',
    ];
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
