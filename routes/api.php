<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'as' => 'api.', 'middleware' => 'api'], function () {
    Route::post('/convert','ConversionsController@store')->name('api.convert');
    Route::get('/conversions/recent','ConversionsController@recent')->name('api.recent');
    Route::get('/conversions/popular','ConversionsController@popular')->name('api.popular');
});