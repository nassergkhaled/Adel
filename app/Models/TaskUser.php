<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskRole extends Model
{
    protected $table = 'role_task'; // Define the table name if it's not the default

    // Define fillable attributes if necessary
    protected $fillable = [
        'task_id', 'user_id', 'assigned_date'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
