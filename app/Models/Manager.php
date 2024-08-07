<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_name',
        'id',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
