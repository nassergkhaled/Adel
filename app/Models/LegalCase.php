<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'case_role', 'case_id', 'role_id');
    }
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
}
