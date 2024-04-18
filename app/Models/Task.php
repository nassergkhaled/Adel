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
    public function roles()
{
    return $this->belongsToMany(Role::class, 'role_task', 'task_id', 'user_id')
                ->withPivot('assigned_date')
                ->withTimestamps();
}



}
