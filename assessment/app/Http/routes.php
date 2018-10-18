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

Route::post('api/v1/register', 'APIController\UserAPIController@register');
Route::post('api/v1/login', 'APIController\AuthAPIController@login');
Route::get('api/v1/user/detail', 'APIController\UserAPIController@getAuthUser');

Route::resource('api/v1/users', 'APIController\UserAPIController');
Route::resource('api/v1/orders', 'APIController\OrderAPIController');