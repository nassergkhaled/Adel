<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;


    public function witnesses()
    {
        return $this->hasMany(Witness::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function sessiones()
    {
        return $this->hasMany(Session::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
