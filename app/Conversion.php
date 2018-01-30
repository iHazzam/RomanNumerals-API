<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = "integer_conversions";
    protected $fillable = ['integer_value','count','roman_numeral_value','created_at'];
}
