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

Route::group(array('prefix' => 'post'), function() {
    Route::resource('trash', 'PostTrashController', ['only' => ['index', 'show', 'update', 'destroy']]);
});

Route::resource('post', 'PostController');

// Authentication routes...
Route::get('auth/login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin',
]);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout',
]);

// Registration routes...
Route::get('auth/register', [
    'as' => 'register',
    'uses' => 'Auth\AuthController@getRegister',
]);
Route::post('auth/register', 'Auth\AuthController@postRegister');
