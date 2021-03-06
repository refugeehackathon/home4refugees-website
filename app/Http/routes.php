<?php

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

// Home
Route::get('/', 'HomeController@index');
Route::get('home/offer/{offer}', 'HomeController@showOffer');

// Picture
Route::get('picture/{picture}', 'PictureController@getPicture');

// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

    Route::get('register/refugee', 'Auth\AuthController@getRefugeeRegister');
    Route::post('register/refugee', 'Auth\AuthController@postRefugeeRegister');
    Route::get('register/host', 'Auth\AuthController@getHostRegister');
    Route::post('register/host', 'Auth\AuthController@postHostRegister');
});

// Host
Route::group(['prefix' => 'host', 'middleware' => ['auth', 'host']], function () {
    Route::get('profile', 'Host\ProfileController@getProfile');
    Route::put('profile', 'Host\ProfileController@putProfile');

    Route::resource('offers', 'Host\OfferController');
    Route::get('offers/{offer}/delete', 'Host\OfferController@delete');
});