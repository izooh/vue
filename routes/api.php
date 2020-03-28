<?php

use Illuminate\Http\Request;
use App\User;

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
Route::get('/getUser', function (Request $request) {
    return User::query()->select('name','s_id')->orderBy('name', 'asc')->get();
});
Route::get('/test1',function(){
  echo "worked";
});
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
Route::post('/logout','AuthController@logout');
Route::get('articles', 'my_api@index');
Route::get('article/{id}', 'my_api@show');
Route::middleware('auth:api')->delete('article/{id}', 'my_api@destroy');
Route::post('article', 'my_api@store');
Route::PUT('article/{id}', 'my_api@edit');
//rating controller routes
Route::middleware('admin')->post('rate', 'RatingController@store');
Route::middleware('admin')->post('rating','RatingController@create');
Route::middleware('admin')->post('default','RatingController@index');

// remains upload routes
Route::get('/test','importController@getImport');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');

//remain controller routes
Route::middleware('admin')->get('remains','remainsController@index');


//leads Controller
//route to retrive leads that dont belong to remain table
Route::middleware('admin')->get('lead','LeadController@index');
Route::middleware('admin')->get('remains','LeadController@index');
Route::post('leads','LeadController@store');
Route::middleware('admin')->post('user_remains','LeadController@show');
Route::post('revert','LeadController@revert');
Route::post('revertAll','LeadController@revertAll');
Route::middleware('admin')->delete('/lead_delete','LeadController@destroy');
Route::middleware('admin')->post('close','LeadController@close');
//SuggestionController RouteS
Route::post('suggestion', 'SuggestionController@store');
Route::get('suggestions', 'SuggestionController@index');
Route::get('suggestion/{id}', 'SuggestionController@show');
Route::middleware('auth:api')->delete('suggestion/{id}', 'SuggestionController@destroy');
//promise controller RouteS
Route::post('promises','PromiseController@store');
Route::post('ptps','PromiseController@show');



