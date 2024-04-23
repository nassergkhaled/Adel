<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniquePhone implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (DB::table('managers')->where('phone_number', $value)->exists()) {
            return false;
        }

        $jsonTables = ['clients', 'secretaries', 'lawyers'];

        foreach ($jsonTables as $table) {
            if (DB::table($table)->where('contact_info->phone', $value)->exists()) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is already in use.';
    }
}
