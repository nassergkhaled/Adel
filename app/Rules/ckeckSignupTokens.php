<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ckeckSignupTokens implements Rule
{
    private $attribute;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    public function passes($attribute, $value)
    {
        // Check if exists in offices table under subscription_code column
        $existsInOffices = DB::table('offices')->where('subscription_code', $value)->exists();

        // Check if exists in clients table under signupToken column
        $existsInClients = DB::table('clients')->where('signupToken', $value)->exists();

        return $existsInOffices && $existsInClients;
    }

    public function message()
    {
        return "This joining code is invalid or has been used.";
    }
}
