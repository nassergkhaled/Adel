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
        return $this->belongsTo(Lawyer::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function cases()
    {
        return $this->belongsToMany(LegalCase::class);
    }
    public function secretary()
    {
        return $this->belongsTo(Secretary::class);
    }
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'role_task', 'user_id', 'task_id')
            ->withPivot('assigned_date')
            ->withTimestamps();
    }
}
