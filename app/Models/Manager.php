<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
