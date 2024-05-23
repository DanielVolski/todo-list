<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CPF implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->first_digit_match($value) or $this->second_digit_match($value))
            $fail('Invalid CPF');
    }

    private function first_digit_match(string $cpf): bool {
        $sum = 0;

        for ($i = 0, $mult = 10; $i < 10; $i++, $mult--)
            $sum = $sum + ($cpf[$i] * $mult);
    
        $remainder = $sum % 11;
        $first_digit =  $remainder < 2 ? 0 : 11 - $remainder;

        return ($first_digit != $cpf[9]);
    }

    private function second_digit_match(string $cpf): bool {
        $sum = 0;

        for ($i = 0, $mult = 11; $i < 11; $i++, $mult--)
            $sum = $sum + ($cpf[$i] * $mult);

        $remainder = $sum % 11;
        $second_digit = $remainder < 2 ? 0 : 11 - $remainder;
        
        return ($second_digit != $cpf[10]);
    }
}
