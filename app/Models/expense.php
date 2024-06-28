<?php

namespace App\Models;

use App\Traits\GeneratesCustomId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    use GeneratesCustomId;


    protected $table = 'expenses';

    protected $fillable = [
        'invoice_id',
        'case_id',
        'activity',
        'activity_type',
        'date',
        'amount',
        'quantity',
        'total_amount',
        'is_paid',
        'description',
    ];

    public function legalCase()
    {
        return $this->belongsTo(legalCase::class);
    }
    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }
}
