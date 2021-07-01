<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/files/list', 'FileController@index')->name('files.list');

Route::get('/file/create', 'FileController@create')->name('file.create');
Route::post('/file/create', 'FileController@store')->name('file.store');


Route::get('/file/show/{id}', 'FileController@show')->name('file.show');
//Route::get('/file/download/{id}', 'FileController@download')->name('file.download');

Route::get('/file/download/{id}', 'FileController@download')->name('file.download');
Route::get('/fie/edit/{id}', 'FileController@edit')->name('file.edit');
Route::post('/file/update/{id}', 'FileController@update')->name('file.update');

Route::get('/file/destroy/{id}', 'FileController@destroy')->name('file.destroy');

