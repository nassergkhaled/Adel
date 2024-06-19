<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class existCLientOrCase implements Rule
{
    protected $message;
    public $result = null;


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value != NULL) {
            if (strpos($value, 'case-') === 0) {
                $id = str_replace('case-', '', $value);
                if (DB::table('legal_cases')->where('id', $id)->exists()) {
                    $this->result = ['type' => 'case', 'id' => $id];

                    return true;
                } else {
                    $this->message = 'The selected LegalCase does not exist.';
                    return false;
                }
            } elseif (strpos($value, 'client-') === 0) {
                $id = str_replace('client-', '', $value);
                if (DB::table('clients')->where('user_id', $id)->exists()) {
                    $this->result = ['type' => 'client', 'id' => (int)$id];
                    return true;
                } else {
                    $this->message = 'The selected client does not exist.';
                    return false;
                }
            } else {
                $this->message = 'The input format is wrong.';
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
