<?php

namespace App\Http\Controllers\Api;

use App\Conversion;
use App\IntegerConversion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConversionRequest;

class ConversionsController extends Controller
{
    public function store(ConversionRequest $request)
    {
        $conversion = new Conversion();
        $integer_conversion = new IntegerConversion();
        $conversion->integer_value = $request->integer;
        $val = $integer_conversion->toRomanNumerals($request->integer);
        if($val == null)
        {
            //Error
        }
        $conversion->roman_numeral_value = $val;
        $conversion->save();

        //Success return fractal


    }
}
