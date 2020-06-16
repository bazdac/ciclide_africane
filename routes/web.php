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
    return view('home');
})->name('home');

Auth::routes();

Route::get('/apa-sarata', 'HomeController@index')->name('apa-sarata');
Route::get('/apa-dulce', 'HomeController@index')->name('apa-dulce');
Route::get('/hrana-pesti', 'HomeController@index')->name('hrana-pesti');
