<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'case_sessions';

    protected $fillable= [
        'case_id',
        'session_name' ,
        'session_status' ,
        'session_Date',
        'Judge_name',
        'session_location',
        'file',
    ];

    public function lagalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }

}
