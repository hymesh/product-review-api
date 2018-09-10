<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/products', 'ProductController@index');

Route::get('/products/{product}', 'ProductController@show');

Route::get('/products/{product}/reviews', 'ProductController@showReviews');

Route::group(['middleware' => 'auth.basic'], function () {
    Route::post('/products', 'ProductController@store');

    Route::put('/products/{product}', 'ProductController@update');

    Route::delete('/products/{product}', 'ProductController@destroy');

    Route::post('/products/{product}/reviews', 'ProductController@storeReview');
});

Route::auth();

Route::get('/',  function () {
   return view('welcome');
});
Route::get('/home', 'HomeController@index');

