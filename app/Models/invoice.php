<?php

namespace App\Models;

use App\Traits\GeneratesCustomId;
use App\Traits\GeneratesInvoiceId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    // use GeneratesInvoiceId;
    use GeneratesCustomId;



    protected $table = 'invoices';

    protected $fillable = [
        'case_id',
        'expenses_amount',
        'paidFunds_amount',
        'status',
        'paid_amount',
        'pay_method',
        'pay_date',
        'due_date',
    ];
    public function requestedFunds()
    {
        return $this->hasMany(requestedFund::class);
    }
    public function expense()
    {
        return $this->hasMany(expense::class);
    }
    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class, 'case_id', 'id');
    }
}
