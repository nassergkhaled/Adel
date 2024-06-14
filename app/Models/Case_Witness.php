<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Case_Witness extends Model
{
    use HasFactory;
    protected $table = "case_witness";
    protected $fillable = [
        'legal_case_id',
        'witness_id',
        'testimony_date',
    ];
}
