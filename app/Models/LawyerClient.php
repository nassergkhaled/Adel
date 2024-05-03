<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'lawyer_id',
        'client_id',
    ];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
