<?php

namespace App\Http\Controllers\API;

use App\Noticia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\APINoticiaStoreRequest;
use App\Http\Requests\APINoticiaUpdateRequest;

/**
 * @group API da Noticia
 * 
 *  APIs para gerir notícias e ver as respetivas secções  e jornais
 */
class APINoticiaController extends Controller
{
    /**
     * Apresentação das notícias realizadas por grandes repórteres.
     * Interpretação de quem fez a notícia, para que jornal é, e qual a secção que se destina
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticia = Noticia::with('jornal')->with('seccao')->with('user')->get();

        $response = [
            'data' => $noticia,
            'message' => 'Listagem de Noticias',
            'result' => 'OK'
        ];

        return response($response, 200);
    }
    /**
     * Apresentação do formulário de inserir notícias.
     *@bodyParam  message string required para validar se o utilizador com role de reporter, editor ou admin é diferente
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;
        if ($userID->role->name !== "admin" || $roleSession !== "editor" || $userID->role->name !== "reporter") {
            $response = [
                'message' => 'Não tem acesso',
                'result' => 'OK',
            ];
            return response($response, 200);
        } else if ($userID->role->name === "admin" || $roleSession === "editor" || $userID->role->name === "reporter") {
            $jornal = Jornal::all();
            $seccao = Seccao::all();
            $users = User::all();
            $response = [
                'jornais' => $jornal,
                'seccaos' => $seccao,
                'users' => $users,
                'message' => 'Form de Noticias',
                'result' => 'OK'
            ];

            return response($response, 200);
        }
    }

    /**
     * Inserir uma notícia na Base de dados.
     * Faz redirect da rota se armazenar os dados corretamente esta 
     * verificação é realizada pelo http code 201
     * 
     * @bodyParam  titulo_noticia string required necessário ter um nome para a notícia
     * @bodyParam  corpo_noticia string required necessário ter um corpo de notícia
     * @bodyParam  jornal_id integer required necessário saber a que Jornal pertence esta notícia
     * @bodyParam  seccao_id integer required necessário saber a secção da notícia
     * @bodyParam  user_id integer required necessário saber quem é o repórter do Jornal
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APINoticiaStoreRequest $request)
    {
        $data = $request->all();

        $noticia = Noticia::create(
            [
                'titulo_noticia' => $data['titulo_noticia'],
                'corpo_noticia' => $data['corpo_noticia'],
                'jornal_id' => $data['jornal_id'],
                'seccao_id' => $data['seccao_id'],
                'user_id' => $data['user_id']
            ]
        );
        $response = [
            'data' => $noticia,
            'message' => 'Noticia adicionada',
            'result' => 'OK'
        ];

        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticium)
    {
        return $noticium;
    }

    /**
     *  Apresentação do formulário de editar noticias.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Noticia $noticium)
    {


        $userID = $request->user();
        $roleSession = $userID->role->name;
        if ($roleSession !== "admin" || $roleSession !== "editor" || $roleSession !== "reporter") {
            $response = [
                'message' => 'Não tem acesso',
                'result' => 'OK',
            ];
            return response($response, 200);
        } else if ($userID->role->name === "admin" || $roleSession === "editor" || $userID->role->name === "reporter") {
            $noticia = Noticia::find($noticium);
            $jornal = Jornal::all();
            $seccao = Seccao::all();
            $users = User::all();
            $response = [
                $noticia => $noticia,
                'jornais' => $jornal,
                'seccaos' => $seccao,
                'users' => $users,
                'message' => 'Form de Noticias para update',
                'result' => 'OK'
            ];

            return response($response, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(APINoticiaUpdateRequest $request, Noticia $noticium)
    {
        $data = $request->all();

        $noticium->update($data);

        return response($noticium,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticium)
    {
        $noticium->delete();

        $response = [
            'message' => 'Jornal eliminado',
            'result' => 'OK'
        ];

        return response($response, 200);
    }
}
