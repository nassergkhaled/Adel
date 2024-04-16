<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
    public function users()
    {
        return $this->hasMany(Witness::class);
    }

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }


}
