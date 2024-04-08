<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function witnesses()
    {
        return $this->hasMany(Witness::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function sessiones()
    {
        return $this->hasMany(Session::class);
    }
}
