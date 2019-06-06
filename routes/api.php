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
Route::post('/logout','AuthController@logout');
Route::get('articles', 'my_api@index');
Route::get('article/{id}', 'my_api@show');
Route::middleware('auth:api')->delete('article/{id}', 'my_api@destroy');
Route::middleware('admin')->post('article', 'my_api@store');
Route::PUT('article/{id}', 'my_api@edit');
//rating controller routes
Route::middleware('admin')->post('rating', 'RatingController@store');
Route::get('rating','RatingController@create');
Route::post('default','RatingController@index');

// remains upload routes
Route::get('/test','importController@getImport');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');

//remain controller routes
Route::middleware('admin')->get('remains','remainsController@index');

//leads upload Routes
Route::get('/leads','leadImportController@getImport');
Route::post('/lead_import_parse', 'leadImportController@parseImport')->name('lead_import_parse');
Route::post('/lead_import_process', 'leadImportController@processImport')->name('lead_import_process');
//leads Controller
//route to retrive leads that dont belong to remain table
Route::middleware('admin')->get('lead','LeadController@index');

//SuggestionController RouteS
Route::post('suggestion', 'SuggestionController@store');
Route::get('suggestions', 'SuggestionController@index');
Route::get('suggestion/{id}', 'SuggestionController@show');
Route::middleware('auth:api')->delete('suggestion/{id}', 'SuggestionController@destroy');
