<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name',
        // 'id_number',
        'id',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'lawyer_clients', 'lawyer_id', 'client_id');
    }

    public function legalCases()
    {
        return $this->hasMany(LegalCase::class);
    }
}
