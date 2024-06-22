<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Witness extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'ID_no',
        'contact_info',
    ];

    
    public function legalCases()
    {
        return $this->belongsToMany(LegalCase::class, 'case_session_witness', 'witness_id');
    }
    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'case_session_witness', 'witness_id', 'case_session_id');
    }

    public function CaseSessionWitness()
    {
        return $this->hasMany(Case_Session_Witness::class, 'witness_id', 'id');
    }
}
