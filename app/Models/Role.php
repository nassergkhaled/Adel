<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function lowyer()
    {
        return $this->hasOne(Lawyer::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
    public function legalCases()
    {
        return $this->belongsToMany(LegalCase::class, 'case_role', 'role_id', 'case_id');
    }
    public function secretary()
    {
        return $this->hasOne(Secretary::class);
    }
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'role_task', 'user_id', 'task_id')
            ->withPivot('assigned_date')
            ->withTimestamps();
    }
}
