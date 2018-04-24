<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::middleware(['middleware'=>'auth'])->prefix('/api/web')->group(function(){
    Route::get('/api/web/books','Books\ApiBooksController@index');
    Route::post('/api/web/books/store','Books\ApiBooksController@store');
    Route::post('/api/web/books/delete/{id}','Books\ApiBooksController@destroy');
    Route::post('/api/web/books/update/{id}','Books\ApiBooksController@update');
//});