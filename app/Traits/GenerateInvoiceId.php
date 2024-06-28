<?php

namespace App\Traits;

use Carbon\Carbon;

trait GeneratesInvoiceId
{
    protected static function bootGeneratesInvoiceId()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = self::generateInvoiceId();
            }
        });
    }

    private static function generateInvoiceId()
    {
        $prefix = 'INV';
        $date = Carbon::now()->format('ymdHis');

        $sequentialNumber = self::count() + 1;

        return $prefix . '-' . $date . '-' . $sequentialNumber;
    }
}
