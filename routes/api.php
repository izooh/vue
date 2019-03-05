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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
Route::get('articles', 'my_api@index');
Route::get('article/{id}', 'my_api@show');
Route::delete('article/{id}', 'my_api@destroy');
Route::post('article', 'my_api@store');
Route::PUT('article/{id}', 'my_api@edit');
