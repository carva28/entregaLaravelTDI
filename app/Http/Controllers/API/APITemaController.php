<?php

namespace App\Http\Controllers\API;

use App\Tema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\APITemaStoreRequest;
use App\Http\Requests\APITemaUpdateRequest;
/**
 * @group API do Tema de personalização do jornal
 * 
 * APIs para gerir temas
 * 
 */
class APITemaController extends Controller
{
    /**
     * Apresenta dos temas de personalização dos jornais
     *
     * 
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tema = Tema::all();

        $response = [
            'data' => $tema,
            'message' => 'Listagem de temas',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Inserir um tema na Base de dados.
     * 
     * 
     * @bodyParam  nometema string  required necessário ter um nome para o tema
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APITemaStoreRequest $request)
    {
        $data = $request->all();

        $tema = Tema::create(
            [
                'nome_tema' => $data['nome_tema'],
            ]
        );

        $response = [
            'data' => $tema,
            'message' => 'Tema adicionado com sucesso',
            'result' => 'OK'
        ];

        return response($response, 201);
    }

    /**
     * Apresentar um tema específico
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        return $tema;
    }

    /**
     * Apresentação do form para editar um tema específico
     * 
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        $temaesp = Tema::find($tema);

        $response = [
            'seccoes' => $temaesp,
            'message' => 'Form de atualizar temas',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * Atualização de um tema específico
     * 
     * @queryParam nome_tema required nome do tema que pretende adicionar
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(APITemaStoreRequest $request, Tema $tema)
    {
        $data = $request->all();

        $tema->update($data);
        $response = [
            'data' => $tema,
            'message' => 'Tema editado',
            'result' => 'OK'
        ];
        return response($response,201);
    }

    /**
     * Eliminar uma notícia específica
     * 
     * Ao clique no botão de eliminar Secção, o ID dessa mesma irá  
     * ser eliminado da base de dados
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();
        $response = [
            'message' => 'Tema eliminado',
            'result' => 'OK'
        ];
        return response($response,200);
    }
}
