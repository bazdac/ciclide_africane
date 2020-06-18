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

Route::get('/home', 'ProdusController@produseToate');
Route::get('/', 'ProdusController@produseToate')->name('home');


Auth::routes();

Route::get('/apa-sarata', 'ProdusController@produseApaSarata')->name('apa-sarata');
Route::get('/apa-dulce', 'ProdusController@produseApaDulce')->name('apa-dulce');
Route::get('/hrana-pesti', 'ProdusController@produseHranaPesti')->name('hrana-pesti');
Route::get('/detalii-produs/{id}', 'ProdusController@produsDetalii')->name('detalii-produs');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/trimitere-mesaj', 'HomeController@trimitereMesajContact')->name('trimitere-mesaj');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/lista-cumparaturi', 'UserController@listaCumparaturi')->name('lista-cumparaturi');
    Route::get('/categorii', 'AdminController@categorii')->name('categorii');
    Route::get('/produse', 'AdminController@produse')->name('produse');
    Route::get('/adauga-produs', 'AdminController@adaugaProdus')->name('adauga-produs');
    Route::get('/creare-produs', 'AdminController@creareProdus')->name('creare-produs');
    Route::get('/editeaza-produs/{id}', 'AdminController@editeazaProdus')->name('editeaza-produs');
    Route::get('/actualizare-produs/{id}', 'AdminController@actualizareProdus')->name('actualizare-produs');
    Route::get('/sterge-produs/{id}', 'AdminController@stergeProdus')->name('sterge-produs');

    Route::get('/adauga-la-lista-cumparaturi', 'UserController@adaugaLaListaCumparaturi')->name('adauga-la-lista-cumparaturi');


    Route::get('/utilizatori', 'AdminController@utilizatori')->name('utilizatori');
    Route::get('/comenzi', 'AdminController@comenzi')->name('comenzi');
    Route::get('/panou-administrare', 'AdminController@panouAdministrare')->name('panou-administrare');
    Route::get('/lista-poze', 'AdminController@listaPoze')->name('lista-poze');
});
