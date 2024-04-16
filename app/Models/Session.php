<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public function lagalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }

}
