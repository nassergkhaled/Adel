<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = [
        'relatedCase_id',
        'relatedClient_id',
        'created_by',
        'title',
        'due_date',
        'priority',
        'description',
        'status',
        'reminder',
    ];
    public function getPriorityAttribute($value)
    {
        switch ($value) {
            case '1':
                return ['name' => 'High', 'class' => 'bg-[#f9c6c6] px-2 py-1 rounded-md text-[#EA1B1B]'];
            case '2':
                return ['name' => 'Medium', 'class' => 'bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]'];
            case '3':
                return ['name' => 'Low', 'class' => 'bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]'];
            default:
                break;
        };
    }

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class, 'relatedCase_id', 'id');
    }
    public function assignedTo()
    {
        return $this->belongsToMany(User::class, 'user_task', 'task_id', 'user_id')
            ->withTimestamps();
    }
    public function created_by()
    {
        return $this->belongsTo(User::class);
    }
    public function clientUser()
    {
        return $this->belongsTo(Client::class,'relatedClient_id','id');
    }
}
