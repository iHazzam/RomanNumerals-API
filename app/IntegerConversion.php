<?php

namespace App;

class IntegerConversion implements IntegerConversionInterface
{
    protected $translation;
    public function __construct()
    {
        $this->translation = collect(config('enums.numerals'));
    }
    public function toRomanNumerals($integer)
    {
        if($integer < 4000 && $integer > 0)
        {
            $numeral = "";
            while ($integer > 0) {
                foreach ($this->translation as $roman => $int) {
                    if($integer >= $int) {
                        $integer -= $int;
                        $numeral .= $roman;
                        break;
                    }
                }
            }
            return $numeral;
        }
        else return null;


    }
}