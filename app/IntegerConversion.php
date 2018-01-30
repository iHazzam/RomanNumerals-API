<?php

namespace App;

class IntegerConversion implements IntegerConversionInterface
{
    protected $translation;
    public function __construct()
    {
        $this->translation = collect(config('enums.numerals'));//initialise the dictionary of numerals
    }
    public function toRomanNumerals($integer)
    {
        //in case the request didn't this case before...
        if($integer < 4000 && $integer > 0)
        {
            $numeral = "";
            while ($integer > 0) {
                //use a simple algorithm to build up the string of numerals
                //Algorithm O(N) but with a defined maximum length so reality 0(1)
                foreach ($this->translation as $roman => $int) {
                    if($integer >= $int) { //if we are in excess of the next value on the list
                        $integer -= $int; //decrement the total
                        $numeral .= $roman; //and append the numeral
                        break;
                    }
                }
            }
            return $numeral;
        }
        else return null;


    }
}