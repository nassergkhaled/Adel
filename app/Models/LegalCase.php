<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;


    public function witnesses()
    {
        return $this->belongsToMany(Witness::class, 'case_session_witness', 'legal_case_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function sessions()
    {
        // return $this->hasMany(Session::class,'case_id','case_sessions');
        return $this->hasMany(Session::class, 'case_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id', 'id');
    }

    public function CaseSessionWitness()
    {
        return $this->hasMany(Case_Session_Witness::class, 'legal_case_id', 'id');
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'case_id', 'id');
    }
    public function requestedFunds()
    {
        return $this->hasMany(requestedFund::class, 'case_id', 'id');
    }
}
