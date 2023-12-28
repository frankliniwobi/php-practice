<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF) {

        //trim every white space before and after the string
        //check the lenght and assign it to the $value variable
        $value = strlen(trim($value));

        return $value !== 0 && $value >= $min && $value <= $max;
    }
}
