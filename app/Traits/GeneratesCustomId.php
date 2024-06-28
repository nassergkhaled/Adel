<?php
namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait GeneratesCustomId
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function bootGeneratesCustomId()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $customId = self::generateCustomId();
                while (self::where($model->getKeyName(), $customId)->exists()) {
                    $customId = self::generateCustomId();
                }
                $model->{$model->getKeyName()} = $customId;
            }
        });
    }

    private static function generateCustomId()
    {
        $now = Carbon::now();
        $date = $now->format('ymd');
        $time = $now->format('Hisv');

        $randomPart = Str::random(5);

        return $date . $time . $randomPart;
    }
}
