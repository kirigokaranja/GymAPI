<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
});
//register user
Route::post('register', 'RegisterController@register');

//login user
Route::post('login', 'RegisterController@login');

//retrieve user details
Route::get('userDetails/{id]', 'ProfileController@getUserDetails');
