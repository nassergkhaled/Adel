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
        return $this->hasMany(Lawyer::class, 'lawyer_clients','client_id');
    }
    public function legalCases()
    {
        return $this->hasMany(LegalCase::class);
    }
}
