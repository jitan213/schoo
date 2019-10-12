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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tweets', "TweetController@index")->name('tweets.index');
Route::get('/tweets/create', "TweetController@create")->name('tweets.create');
Route::post('/tweets', "TweetController@store")->name('tweets.store');
Route::get('/tweets/{id}',"TweetController@show")->name('tweets.show');
Route::get('/tweets/{id}/edit', "TweetController@edit")->name('tweets.edit');
Route::put('/tweets/{id}',"TweetController@update")->name('tweets.update');
Route::delete('/tweets/{id}',"TweetController@destroy")->name('tweets.destroy');

// 認証のルート定義…
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('auth.getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin')->name('auth.postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('auth.getLogout');

// 登録のルート定義…
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('auth.getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('auth.postRegister');
