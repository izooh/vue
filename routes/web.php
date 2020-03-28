<?php
use App\Article;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'HomeController@art');
Route::get('/profile/{username}','HomeController@prof');
Route::get('/update','HomeController@update');



//Route::get('/', 'HomeController@vue');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->get('/', function () {
    return view('vue');
});
Route::get('/r', function () {
    return view('vue');
})->name('index');
//leads related routes
Route::get('/leads', function () {
    return view('leads');
})->name('lead_page')->middleware('permission:leads allocation');
//importing csv to system
Route::middleware('auth')->get('import-excel', 'ImportExcel\ImportExcelController@index');
Route::post('import-excel', 'ImportExcel\ImportExcelController@import');
//complain log routes
Route::post('/add_new', 'ComplainsController@Addcomplain')->name('addnew');
Route::get('/display', 'ComplainsController@Displayall')->name('display')->middleware('permission:view complains');
Route::get('/display_unreviewed', 'ComplainsController@Displayunreviewed')->name('display_unreviewed')->middleware('permission:review complains');
Route::post('/review/{id}', 'ComplainsController@Review')->name('review');
Route::get('/get_review/{id}', 'ComplainsController@GetReview')->name('get_review');

//remain controller routes
Route::get('remains','remainsController@index');


//leads Controller
//route to retrive leads that dont belong to remain table
Route::get('lead','LeadController@index');
Route::get('remains','LeadController@index');
Route::post('leads','LeadController@store');
Route::post('user_remains','LeadController@show');
Route::post('revert','LeadController@revert');
Route::post('revertAll','LeadController@revertAll');
Route::delete('/lead_delete','LeadController@destroy');
Route::post('close','LeadController@close');

//noticeboard routes
Route::post('article', 'my_api@store')->middleware('role:s_admin');
Route::get('articles', 'my_api@index');
Route::delete('article/{id}', 'my_api@destroy');

//history routes
Route::resource('history','HistoryController');





