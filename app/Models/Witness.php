<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Witness extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'ID_no',
        'contact_info',
        'relationship',
        'oath_availability',
        'testimony',
    ];
    public function legalCases()
    {
        return $this->belongsToMany(Witness::class, 'case_witness', 'legal_case_id');
    }
}
