<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        // 'id_number',
        'id',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
