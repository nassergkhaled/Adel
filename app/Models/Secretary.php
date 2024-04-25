<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    use HasFactory;
    public function role()
    {
        return $this->hasOne(Role::class);
    }

}
