<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'case_sessions';

    protected $fillable = [
        'case_id',
        'session_name',
        'session_status',
        'session_Date',
        'Judge_name',
        'session_location',
        'file',
    ];

    public function lagalCase()
    {
        return $this->belongsTo(LegalCase::class, 'case_id', 'id');
    }
    public function witnesses()
    {
        return $this->belongsToMany(Witness::class, 'case_session_witness', 'case_session_id', 'witness_id');
    }

    public function CaseSessionWitness()
    {
        return $this->hasMany(Case_Session_Witness::class, 'case_session_id', 'id');
    }
}
