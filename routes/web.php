<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['name' => 'Admin' ,'middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['name' => 'Home'], function (){
    Route::get('/', 'FrontController@index')->name('frontend.home');
    Route::get('About', 'FrontController@about')->name('about');
    Route::any('contactUs', 'FrontController@contact')->name('contact');
    Route::any('bookStaff', 'FrontController@booking')->name('booking');
    Route::get('privacyPolicy', 'FrontController@privacy')->name('privacy');
    Route::get('termsAndConditions', 'FrontController@terms')->name('terms');
    Route::get('careerOpportunities', 'FrontController@job')->name('job');
    Route::any('apply/{slug}', 'FrontController@jobApplication')->name('job.apply');

});
