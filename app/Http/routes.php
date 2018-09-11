<?php

use Illuminate\Support\Facades\Route;

Route::get('products', 'ProductController@listProduct');

Route::get('products/{productId}', 'ProductController@getProduct');

Route::get('products/{productId}/reviews', 'ProductController@listReview');

Route::group(['middleware' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class], function () {
    Route::post('products', 'ProductController@createProduct');

    Route::put('products/{productId}', 'ProductController@updateProduct');

    Route::delete('products/{productId}', 'ProductController@deleteProduct');

    Route::post('products/{productId}/reviews', 'ProductController@createReview');
});

Route::auth();

Route::get('/',  function () {
   return view('welcome');
});
Route::get('home', 'HomeController@index');

