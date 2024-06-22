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

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = self::generateCustomId();
            }
        });
    }

    private static function generateCustomId()
    {
        $date = Carbon::now()->format('ymd'); // Format the date as yymmdd
        $lastRecord = self::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->first();

        $incrementalDigit = 1;
        if ($lastRecord) {
            $lastId = $lastRecord->id;
            $lastIncrementalDigit = substr($lastId, -4);
            $incrementalDigit = (int)$lastIncrementalDigit + 1;
        }

        $formattedIncrementalDigit = str_pad($incrementalDigit, 4, '0', STR_PAD_LEFT);

        return $date . $formattedIncrementalDigit;
    }
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
