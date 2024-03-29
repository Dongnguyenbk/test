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

Route::post('/login', [
    'as' => 'user.login',
    'uses' => 'UserController@login'
]);

Route::post('/register', [
    'as' => 'user.register',
    'uses' => 'UserController@register'
]);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});