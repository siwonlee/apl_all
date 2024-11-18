<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;



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





Route::get('/', 'SearchController@index')->name('search');
Route::get('/apl', 'SearchController@noupc')->name('search.noupc');
Route::get('/apl/{upc}', 'SearchController@aplSearchSimple')->name('search.simple');
Route::get('/{state}', 'SearchController@refresh')->name('refresh');
Route::post('/general', 'SearchController@general')->name('search.general');


// Route::get('/apl', 'SearchController@aplSearchSimple')->name('search.apl');
// Route::get('/apl/{upc}', 'SearchController@aplSearchSimple')->name('search.simple');
// Route::get('/checkdigit', 'SearchController@status')->name('search.status');