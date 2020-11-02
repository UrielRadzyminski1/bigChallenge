<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SumsTen implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $sum = 0;
        while ($value>0) {
            $toSum = $value % 10;
            $sum += $toSum;
            $value = intdiv($value,10);
        }
        return($sum == 10);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The credit card is not valid';
    }
}
