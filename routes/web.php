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

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@home'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
*/
Route::get('client/{client}', ['as' => 'client', 'uses' => 'ClientController@detail']);
