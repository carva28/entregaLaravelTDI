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

/**
 * Unauthenticated Routes
 */

use App\Http\Controllers\SeccaoController;

Route::get('/', 'MainController@index')->name('index');

/**
 *  Auth & Registration
 */
Auth::routes();

/**
 * Authenticated only Routes
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Backoffice Routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Backoffice', 'middleware' => ['auth', 'role:admin|manager']],
    function()
    {
        Route::get('/', 'DashboardController@index')->name('admin');

        Route::resource('user', 'UserController');
    }
);

/**
 * API Secções
 */

Route::get('/lista_seccao','SeccaoController@index')->name('lista_seccao');  
Route::get('/insert-seccao','SeccaoController@form')->name('seccao-form');  
Route::post('/insert-seccao','SeccaoController@store')->name('insert-seccao');  

Route::get('/editar-seccao/{seccao}','SeccaoController@formupdate')->name('updateseccao-form');
Route::put('/seccao/{seccao}/edit','SeccaoController@update')->name('update-seccao'); //<- name é o nome que usamos no blade na action

Route::get('/elima-seccao/{seccao}','SeccaoController@formdelete')->name('delete-secform');
Route::delete('/elima-seccao/{seccao}','SeccaoController@destroy')->name('delete-seccao');


/**
 * API Secções
 */

