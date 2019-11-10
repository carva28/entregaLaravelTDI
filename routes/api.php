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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function () {
    //Route::resource('jornal', 'JornalController');
    
});

Route::resource('noticia', 'API\APINoticiaController');
Route::resource('seccao', 'API\APISeccaoController');
Route::resource('conteudo', 'API\APIConteudoController');
Route::resource('content_image', 'API\APIContentImageController');
Route::resource('jornal','API\APIJornalController'); //o modelo tipo post, segundo parametro controlador que gere as rotas
