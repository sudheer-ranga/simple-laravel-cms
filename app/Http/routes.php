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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::group(['prefix' => 'post'], function() {
        Route::resource('trash', 'Admin\PostTrashController',
            [
                'only' => ['index', 'show', 'update', 'destroy']
            ]);
    });

    Route::resource('post', 'Admin\PostController');

    Route::resource('tag', 'Admin\TagController');
});


Route::get('admin', function() {
    return redirect()->route('login');
});

Route::get('home', function() {
    return redirect()->route('admin.post.index');
});

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

//Front End

Route::resource('tag', 'FrontEnd\TagController', [
    'only' => ['index', 'show'],
    'as' => 'frontend',
]);

Route::resource('post', 'FrontEnd\PostController', [
    'as' => 'frontend',
    'only' => ['index', 'show'],
]);

Route::resource('post.comment', 'FrontEnd\WithAuth\CommentController', [
    'as' => 'frontend.withauth',
//    'only' => ['index', 'show', 'update', 'destroy']
]);