<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
