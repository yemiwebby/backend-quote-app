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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


    Route::post('/quote',[
        'uses'       =>      'QuoteController@postQuote',
        'as'         =>      'post-quote'
    ]);


    Route::get('/quotes',[
        'uses'       =>      'QuoteController@getQuotes',
        'as'         =>      'get-quotes'
    ]);

    Route::put('/quote/{id}',[
        'uses'       =>      'QuoteController@putQuote',
        'as'         =>      'update-quote'
    ]);

    Route::delete('/quote/{id}',[
        'uses'       =>      'QuoteController@deleteQuote',
        'as'         =>      'delete-quote'
    ]);