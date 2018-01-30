<?php

namespace App\Http\Controllers\Api;

use App\Conversion;
use App\IntegerConversion;
use App\Transformers\ConversionTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConversionRequest;
use Illuminate\Support\Carbon;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\JsonApiSerializer;
use SebastianBergmann\CodeCoverage\Report\Xml\Coverage;
use Spatie\Fractal\Fractal;

class ConversionsController extends Controller
{
    /**
     * Process and store a new conversion
     * @param ConversionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ConversionRequest $request)
    {
        $integer_conversion = new IntegerConversion();
        $val = $integer_conversion->toRomanNumerals($request->integer);
        if($val === null)
        {
            return response()->json([
                'error' => [
                    'message' => 'Error Converting. Value must be < 4000, > 0'
                ]
            ], 404);
        }
        $conversion = Conversion::firstOrCreate(['integer_value' => $request->integer],['roman_numeral_value' => $val,'count' => 0,'created_at'=>Carbon::now()]); //not updateOrCreate as you can't increment in it
        $conversion->count = $conversion->count + 1; //increment the count
        $conversion->save();//and re-save it
        return fractal($conversion,new ConversionTransformer())->respond();
    }

    /**
     * Get any conversions made in the last 24 hours
     * @return \Illuminate\Http\JsonResponse
     */
    public function recent()
    {
        $paginator = Conversion::where('created_at','>=',Carbon::now()->subDay())->orderBy('created_at','desc')->paginate(15);
        $recent = $paginator->getCollection(); //seperate collection and pagination to feed paginator
        return Fractal::create()->collection($recent, new ConversionTransformer())->serializeWith(new JsonApiSerializer())->paginateWith(new IlluminatePaginatorAdapter($paginator))->respond();
    }


    /**
     *  Get the 10 most popular conversions
     * @return \Illuminate\Http\JsonResponse
     */
    public function popular()
    {
        $popular = Conversion::orderBy('count','desc')->limit(10)->get();
        return fractal($popular, new ConversionTransformer())->respond();
    }
}
