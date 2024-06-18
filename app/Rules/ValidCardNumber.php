<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCardNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = convertToEnglishDigits($value);

        $L = strlen($value);
        if ($L < 16 || intval(substr($value, 1, 10)) == 0 || intval(substr($value, 10, 6)) == 0) {
            $fail();
        }

        $s = 0;
        for ($i = 0; $i < 16; $i++) {
            $k = ($i % 2 == 0) ? 2 : 1;
            $d = intval(substr($value, $i, 1)) * $k;
            $s += ($d > 9) ? $d - 9 : $d;
        }

        if (($s % 10) != 0) {
            $fail("invalid card number");
        }
    }
}
