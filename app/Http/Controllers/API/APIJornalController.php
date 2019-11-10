<?php

namespace App\Http\Controllers\API;

use App\Jornal;
use App\User;
use App\Noticia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\APIJornalStoreRequest;
use App\Http\Requests\APIJornalUpdateRequest;

/**
 * @group API do Jornal 
 * 
 * APIs para gerir jornais
 * 
 */
class APIJornalController extends Controller
{
    /**
     * Apresentação dos jornais associados aos editores.
     * Interpretação de quem pertence o jornal
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornal = Jornal::with('user')->get();


        $response = [
            'data' => $jornal,
            'message' => 'Listagem de jornais',
            'result' => 'OK',
        ];


        return response($response, 200);
    }



    /**
     * Apresentação do formulário de inserir jornais.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;

        if ($userID->role->name === "reporter") {
            $response = [
                'data' => 'Não tem acesso',
                'message' => 'Listagem de jornais',
                'result' => 'OK',
            ];
            return response($response, 200);
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            $user = User::all();
            
            $response = [
                'data' => $user,
                'message' => 'Listagem de jornais',
                'result' => 'OK',
            ];
            return response($response, 200);
        }
    }

    /**
     * Inserir uma notícia na Base de dados.
     * Faz redirect da rota se armazenar os dados corretamente esta 
     * verificação é realizada pelo http code 201
     * 
     * @bodyParam  name_jornal string required Dar um nome criativo ao Jornal
     * @bodyParam  description string required necessário ter uma descrição associada ao Jornal
     * @bodyParam  user_id integer required necessário saber a quem pertence o jornal
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APIJornalStoreRequest $request)
    {
        $data = $request->all();

        $jornal = Jornal::create(
            [
                'name_jornal' => $data['name_jornal'],
                'description' => $data['description'],
                'user_id' => $data['user_id']
            ]
        );

        $response = [
            'data' => $jornal,
            'message' => 'Jornal adicionado',
            'result' => 'OK'
        ];

        return response($response, 201);
    }

    /**
     * Apresentação de um jornal específicao
     * 
     * Apresenta um jornal tendo por base no ID
     * 
     *
     * @param  \App\Jornal  $jornal
     * @return \Illuminate\Http\Response
     */
    public function show(Jornal $jornal)
    {
        return $jornal;
    }

    /**
     * Apresentação do formulário de editar jornais.
     *
     * @param  \App\Jornal  $jornal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Jornal $jornal)
    {
        $userID = $request->user();

        if ($userID->role->name === "reporter") {
            $response = [
                'message' => 'Não tem acesso',
                'result' => 'OK',
            ];
            return response($response, 200);
        } else {
            $jornal = Jornal::find($jornal);

            $response = [
                'data' => $jornal,
                'message' => 'Listagem de jornais por id',
                'result' => 'OK',
            ];
            return response($response, 200);
        }
    }

    /**
     * Atualização de um jornal específico
     * Ao editar um jornal presente no feed, é enviado o ID especifico do mesmo, nessa 
     * ligação, a função formupdate irá associar o id do jornal apresentando toda a informação 
     * sobre o mesmo
     * @queryParam name_jornal required Título do jornal
     * @queryParam description required Descrição sobre o jornal
     * @queryParam user_id required Editor do jornal
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jornal $jornal
     * @return \Illuminate\Http\Response
     */
    public function update(APIJornalUpdateRequest $request, Jornal $jornal)
    {
        $data = $request->all();
        $jornal->update($data);
        return response($jornal, 200);
    }


    /**
     * Eliminar um jornal específico
     * 
     * Ao clique no botão de eliminar jornal, o ID desse mesmo irá  
     * ser eliminado na base de dados
     *
     * @param  \App\Jornal  $jornal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornal $jornal)
    {

        $jornal->delete();

        $response = [
            'message' => 'Jornal eliminado',
            'result' => 'OK'
        ];

        return response($response, 200);
    }
}
