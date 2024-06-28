<?php

namespace App\Models;

use App\Traits\GeneratesCustomId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestedFund extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    use GeneratesCustomId;


    protected $table = 'requested_funds';

    protected $fillable = [
        'invoice_id',
        'case_id',
        'requested_amount',
        'paid_amount',
        'pay_method',
        'pay_date',
        'due_date',
        'message',
    ];
    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }
    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }
}
