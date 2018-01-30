<?php

namespace App\Transformers;

use App\Conversion;
use Illuminate\Support\Carbon;
use League\Fractal\TransformerAbstract;

class ConversionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Conversion $conversion)
    {
        return [
            'id' => $conversion->id,
            'decimal' => $conversion->integer_value,
            'roman' => $conversion->roman_numeral_value,
            'created' => Carbon::parse($conversion->created_at->diffForHumans())
        ];
    }
}
