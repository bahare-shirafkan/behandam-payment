<?php


function convertToEnglishDigits($input)
{
    $persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabicDigits = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $output = str_replace($persianDigits, $englishDigits, $input);
    $output = str_replace($arabicDigits, $englishDigits, $output);

    return $output;
}
