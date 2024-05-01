<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name',
        'id_number',
        'user_id',
    ];
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function clients()
{
    return $this->belongsToMany(Client::class, 'lawyer_client');
}

}
