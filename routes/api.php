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

/** Users & Auth Route */
Route::post('auth/register','Api\AuthController@register');
Route::post('auth/login','Api\AuthController@login');
Route::get('users','Api\UserController@users');
Route::get('users/profile','Api\UserController@profile')->middleware('auth:api');

/** Post Route */
Route::post('oponions/store','Api\OpinionController@store')->middleware('auth:api');