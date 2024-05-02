<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function lawyers()
    {
        return $this->belongsToMany(Lawyer::class, 'lawyer_client');
    }
    public function legalCases()
    {
        return $this->belongsToMany(LegalCase::class);
    }

}
