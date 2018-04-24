<?php

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication routes
|--------------------------------------------------------------------------
*/
Route::get('login', ['as' => 'login', 'uses' => 'AccountController@login_form']);
Route::post('login', ['uses' => 'AccountController@login']);
