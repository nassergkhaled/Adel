<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Case_Session_Witness extends Model
{
    use HasFactory;
    protected $table = "case_session_witness";
    public $timestamps = false;

    protected $fillable = [
        'legal_case_id',
        'case_session_id',
        'witness_id',
    ];


    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class, 'id', 'legal_case_id');
    }
    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'case_session_id');
    }
    public function witnesse()
    {
        return $this->hasOne(Witness::class, 'id', 'witness_id');
    }
}
