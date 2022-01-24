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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['name' => 'Home'], function (){
    Route::get('/', 'FrontApiController@index');
    Route::get('About', 'FrontApiController@about');
    Route::post('contactUs', 'FrontApiController@contact');
    Route::any('bookStaff', 'FrontApiController@booking');
    Route::get('privacyPolicy', 'FrontApiController@privacy');
    Route::get('termsAndConditions', 'FrontApiController@terms');
    Route::get('careerOpportunities', 'FrontApiController@job');
    Route::any('apply/{slug}', 'FrontApiController@jobApplication');
});
