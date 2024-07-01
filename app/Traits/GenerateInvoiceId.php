<?php

namespace App\Traits;

use Carbon\Carbon;

trait GenerateInvoiceId
{
    protected static function bootGenerateInvoiceId()
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
        $date = Carbon::now()->format('Ymd');

        $sequentialNumber = self::count() + 1;

        return $prefix . '-' . $date . '-' . $sequentialNumber;
    }
}
