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
Route::group(
    ['prefix' => 'admin', 'namespace' => 'Backoffice', 'middleware' => ['auth', 'role:admin|editor']],
    function () {
        Route::get('/', 'DashboardController@index')->name('admin');

        Route::resource('user', 'UserController');
    }
);

/**
 * ADMIN & Editor & Reporter
 */
Route::group(
    ['middleware' => ['auth', 'role:admin|editor|reporter']],
    function () {
        /**
         * API seccao
         */
        Route::get('/lista_seccao', 'SeccaoController@index')->name('lista_seccao');
        Route::get('/insert-seccao', 'SeccaoController@form')->name('seccao-form');
        Route::post('/insert-seccao', 'SeccaoController@store')->name('insert-seccao');
        // /**
        //  * API jornal
        //  */
        Route::get('/insert-jornal', 'JornalController@form')->name('jornal-form');
        Route::post('/insert-jornal', 'JornalController@store')->name('insert-jornal');

        /**
         * API noticias
         */

        Route::get('/lista_noticia', 'NoticiaController@index')->name('lista_noticia');
        Route::get('/insert-noticia', 'NoticiaController@form')->name('noticia-form');
        Route::post('/insert-noticia', 'NoticiaController@store')->name('insert-noticia');
        Route::get('/editar-noticia/{noticium}', 'NoticiaController@formupdate')->name('updatenoticia-form');
        Route::put('/noticias/{noticium}/edit', 'NoticiaController@update')->name('update-noticia');

        /**
         * API Conteudos
         */

        Route::get('/lista_conteudo', 'ConteudoController@index')->name('lista_conteudo');
        Route::get('/insert-conteudo', 'ConteudoController@form')->name('conteudo-form');
        Route::post('/insert-conteudo', 'ConteudoController@store')->name('insert-conteudo');


        /**
         * API Editar Imagem
         */
        Route::get('/lista_editarimagem', 'ContentImageController@index')->name('lista_editarimagem');
        Route::get('/insert-editarimagem', 'ContentImageController@form')->name('editarimagem-form');
        Route::post('/insert-editarimagem', 'ContentImageController@store')->name('insert-editarimagem');
        Route::get('/editarimagem-img/{content_image}', 'ContentImageController@show')->name('editarimagem-img');
    
        /**
         * API tema
         */

        Route::get('/lista_tema', 'TemaController@index')->name('lista_tema');
        Route::get('/insert-tema', 'TemaController@create')->name('tema-form');
        Route::get('/editar-tema/{tema}', 'TemaController@edit')->name('updatetema-form');
        Route::get('/elima-tema/{tema}', 'TemaController@destroy')->name('delete-temaform');
        

        /**
         * API TemaJornal
         */

        Route::get('/lista_temajornal', 'TemaJornalController@index')->name('lista_temajornal');
        Route::get('/insert-temajornal', 'TemaJornalController@create')->name('temajornal-form');
        Route::get('/editar-temajornal/{temajornal}', 'TemaJornalController@edit')->name('updatetemajornal-form');
        Route::get('/elima-temajornal/{temajornal}', 'TemaJornalController@destroy')->name('delete-temajornalform');

    }
);
/**
 * ADMIN & Editor
 */
Route::group(
    ['middleware' => ['auth', 'role:admin|editor']],
    function () {
        /**
         * API Seccao
         */

        Route::get('/editar-seccao/{seccao}', 'SeccaoController@formupdate')->name('updateseccao-form');
        Route::put('/seccao/{seccao}/edit', 'SeccaoController@update')->name('update-seccao'); //<- name é o nome que usamos no blade na action
        Route::get('/elima-seccao/{seccao}', 'SeccaoController@formdelete')->name('delete-secform');
        Route::delete('/elima-seccao/{seccao}', 'SeccaoController@destroy')->name('delete-seccao');

        /**
         * API Jornal
         */
        Route::get('/editar-jornal/{jornal}', 'JornalController@formupdate')->name('updatejornal-form');
        Route::put('/jornal/{jornal}/edit', 'JornalController@update')->name('update-jornal');

        /**
         * API noticias
         */
        Route::get('/elima-noticia/{noticium}', 'NoticiaController@formdelete')->name('delete-noticiaform');
        Route::delete('/elima-noticia/{noticium}', 'NoticiaController@destroy')->name('delete-noticia');

        /**
         * API Conteudos
         */
        Route::get('/editar-conteudo/{conteudo}', 'ConteudoController@formupdate')->name('updateconteudo-form');
        Route::put('/conteudo/{conteudo}/edit', 'ConteudoController@update')->name('update-conteudo');
   
        /**
         * API tema
         */

        //Route::get('/lista_tema', 'TemaController@index')->name('lista_tema');
        //Route::get('/insert-tema', 'TemaController@create')->name('tema-form');
        Route::post('/insert-tema', 'TemaController@store')->name('insert-tema');
        //Route::get('/editar-tema/{tema}', 'TemaController@edit')->name('updatetema-form');
        Route::put('/tema/{tema}/edit', 'TemaController@update')->name('update-tema');
        //Route::get('/elima-tema/{tema}', 'TemaController@destroy')->name('delete-temaform');
        Route::delete('/elima-tema/{tema}', 'TemaController@destroy')->name('delete-tema');

        /**
         * API tema
         */

        //Route::get('/lista_temajornal', 'TemaJornalController@index')->name('lista_temajornal');
        //Route::get('/insert-temajornal', 'TemaJornalController@create')->name('temajornal-form');
        Route::post('/insert-temajornal', 'TemaJornalController@store')->name('insert-temajornal');
        // Route::get('/editar-temajornal/{temajornal}', 'TemaJornalController@edit')->name('updatetemajornal-form');
        Route::put('/temajornal/{temajornal}/edit', 'TemaJornalController@update')->name('update-temajornal');
        //Route::get('/elima-temajornal/{temajornal}', 'TemaJornalController@destroy')->name('delete-temajornalform');
        Route::delete('/elima-temajornal/{temajornal}', 'TemaJornalController@destroy')->name('delete-temajornal');

   
    }
);

/**
 * ADMIN 
 */
Route::group(
    ['middleware' => ['auth', 'role:admin']],
    function () {
        /**
         * API Jornal
         */
        Route::get('/elima-jornal/{jornal}', 'JornalController@formdelete')->name('delete-jornalform');
        Route::delete('/elima-jornal/{jornal}', 'JornalController@destroy')->name('delete-jornal');

        /**
         * API Conteudos
         */
        Route::get('/elima-conteudo/{conteudo}', 'ConteudoController@formdelete')->name('delete-conteudoform');
        Route::delete('/elima-conteudo/{conteudo}', 'ConteudoController@destroy')->name('delete-conteudo');
    }
);

/**
 * API Secções
 */
/* 
Route::get('/lista_seccao', 'SeccaoController@index')->name('lista_seccao');
Route::get('/insert-seccao', 'SeccaoController@form')->name('seccao-form');
Route::post('/insert-seccao', 'SeccaoController@store')->name('insert-seccao');

Route::get('/editar-seccao/{seccao}', 'SeccaoController@formupdate')->name('updateseccao-form');
Route::put('/seccao/{seccao}/edit', 'SeccaoController@update')->name('update-seccao'); //<- name é o nome que usamos no blade na action

Route::get('/elima-seccao/{seccao}', 'SeccaoController@formdelete')->name('delete-secform');
Route::delete('/elima-seccao/{seccao}', 'SeccaoController@destroy')->name('delete-seccao'); */


/**
 * API Jornais
 */

Route::get('/lista_jornais', 'JornalController@index')->name('lista_jornais');
Route::get('/listarnewsjornal/{jornal}', 'NoticiaController@juncao')->name('lista_noticia_jornal');
Route::get('/lista_noticia_seccao/{seccao}/{jornal}', 'NoticiaController@jornalseccao')->name('lista_noticia_seccao');

/* Route::get('/insert-jornal', 'JornalController@form')->name('jornal-form');
Route::post('/insert-jornal', 'JornalController@store')->name('insert-jornal');

Route::get('/editar-jornal/{jornal}', 'JornalController@formupdate')->name('updatejornal-form');
Route::put('/jornal/{jornal}/edit', 'JornalController@update')->name('update-jornal');

Route::get('/elima-jornal/{jornal}', 'JornalController@formdelete')->name('delete-jornalform');
Route::delete('/elima-jornal/{jornal}', 'JornalController@destroy')->name('delete-jornal'); */

// /**
//  * API noticias
//  */

// Route::get('/lista_noticia', 'NoticiaController@index')->name('lista_noticia');
// Route::get('/insert-noticia', 'NoticiaController@form')->name('noticia-form');
// Route::post('/insert-noticia', 'NoticiaController@store')->name('insert-noticia');

// Route::get('/editar-noticia/{noticium}', 'NoticiaController@formupdate')->name('updatenoticia-form');
// Route::put('/noticias/{noticium}/edit', 'NoticiaController@update')->name('update-noticia');

// Route::get('/elima-noticia/{noticium}', 'NoticiaController@formdelete')->name('delete-noticiaform');
// Route::delete('/elima-noticia/{noticium}', 'NoticiaController@destroy')->name('delete-noticia');


/**
 * API Noticas de cada Jornal
 */

// Route::get('/listarnewsjornal/{jornal}', 'NoticiaController@juncao')->name('lista_noticia_jornal');

// Route::get('/lista_noticia_seccao/{seccao}/{jornal}', 'NoticiaController@jornalseccao')->name('lista_noticia_seccao');
// /**
//  * API Conteudos
//  */

// Route::get('/lista_conteudo', 'ConteudoController@index')->name('lista_conteudo');
// Route::get('/insert-conteudo', 'ConteudoController@form')->name('conteudo-form');
// Route::post('/insert-conteudo', 'ConteudoController@store')->name('insert-conteudo');

// Route::get('/editar-conteudo/{conteudo}', 'ConteudoController@formupdate')->name('updateconteudo-form');
// Route::put('/conteudo/{conteudo}/edit', 'ConteudoController@update')->name('update-conteudo');

// Route::get('/elima-conteudo/{conteudo}', 'ConteudoController@formdelete')->name('delete-conteudoform');
// Route::delete('/elima-conteudo/{conteudo}', 'ConteudoController@destroy')->name('delete-conteudo');


// /**
//  * API Editar Imagem
//  */
// Route::get('/lista_editarimagem', 'ContentImageController@index')->name('lista_editarimagem');
// Route::get('/insert-editarimagem', 'ContentImageController@form')->name('editarimagem-form');
// Route::post('/insert-editarimagem', 'ContentImageController@store')->name('insert-editarimagem');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
