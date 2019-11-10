<?php

namespace App\Http\Controllers\API;

use App\Seccao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\APISeccaoStoreRequest;
use App\Http\Requests\APISeccaoUpdateRequest;

/**
 * @group API do Jornal 
 * 
 * APIs para gerir secções
 * 
 */
class APISeccaoController extends Controller
{
    /**
     * Apresenta das secções dos jornais
     *
     * 
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seccao = Seccao::all();

        $response = [
            'data' => $seccao,
            'message' => 'Listagem de Seccao',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    public function form()
    {
        $seccao = Seccao::all();

        $response = [
            'seccoes' => $seccao,
            'message' => 'Form de inserir seccoes',
            'result' => 'OK'
        ];
        return response($response, 200);
    }


    /**
     * Inserir uma secção na Base de dados.
     * Faz redirect da rota se armazenar os dados corretamente esta verificação é realizada
     * pelo http code 201
     * 
     * @bodyParam  nome_seccao string  required necessário ter um nome para a secção
     * @bodyParam  imagem_seccao string required necessário ter uma imagem
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APISeccaoStoreRequest $request)
    {
        $data = $request->all();


        $file = $request->file('imagem_seccao')->store('images');
        $data['imagem_seccao'] = $file;

        $seccao = Seccao::create(
            [
                'nome_seccao' => $data['nome_seccao'],
                'imagem_seccao' => $data['imagem_seccao'],
            ]
        );

        $response = [
            'data' => $seccao,
            'message' => 'Seccao adicionada',
            'result' => 'OK'
        ];

        return response($response, 201);
    }



    public function formupdate($id)
    {
        $seccao = Seccao::find($id);

        $response = [
            'seccoes' => $seccao,
            'message' => 'Form de atualizar seccoes',
            'result' => 'OK'
        ];

        return response($response, 200);
    }
    /**
     * Atualização de uma secção específica 
     * Ao editar uma secção presente no feed, é enviado o ID especifico do mesmo, nessa 
     * ligação, a função formupdate irá associar o id da secção apresentando toda a informação 
     * sobre a mesma
     * @queryParam nome_seccao required nome da secção
     * @queryParam imagem_seccao required imagem da secção
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccao $seccao
     * @return \Illuminate\Http\Response
     */
    public function update(APISeccaoUpdateRequest $request, Seccao $seccao)
    {
        $data = $request->all();

        if ($request->hasFile('imagem_seccao')) {

            $file = $request->file('imagem_seccao')->store('images');

            $data['imagem_seccao'] = $file;
        }



        $seccao->update($data);

        return response($seccao,201);
    }


   

    /**
     * Eliminar uma notícia específica
     * 
     * Ao clique no botão de eliminar Secção, o ID dessa mesma irá  
     * ser eliminado da base de dados
     *
     * @param  \App\Seccao  $seccao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccao $seccao)
    {
        
        $seccao->delete();
        $response = [
            'message' => 'Seccao eliminado',
            'result' => 'OK'
        ];
        return response($response,200);
    }
}
