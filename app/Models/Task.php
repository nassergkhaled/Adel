<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;



    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }
    public function users_assigned_to()
    {
        return $this->belongsToMany(User::class, 'user_task', 'task_id', 'user_id')
            ->withPivot('assigned_date')
            ->withTimestamps();
    }
    public function created_by()
    {
        return $this->belongsTo(User::class);
    }
}
