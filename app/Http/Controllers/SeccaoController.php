<?php

namespace App\Http\Controllers;

use App\Seccao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SeccaoStoreRequest;
/**
 * @group API da Secção management
 * 
 * APIs para gerir seccções
 * 
 */
class SeccaoController extends Controller
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

        //return response($response, 200);

        if ($response['result'] == 'OK') {
            return view('mostraseca')
                ->with('seccoes', $seccao);
        } else {
            return 'Ocorreu um erro';
        }
    }

    public function form()
    {
        $seccao = Seccao::all();
        return view('seccaoinsert')
            ->with('seccoes', $seccao);
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
    public function store(SeccaoStoreRequest $request)
    {
        $data = $request->all();


        // $validator = Validator::make($data, [
        //     'nome_seccao' => 'required|unique:seccaos|string|max:60',
        //     'imagem_seccao' => 'required|image'
        // ], [
        //     'nome_seccao.required' => 'é necessário ter um nome',
        //     'imagem_seccao.required' => 'é necessário ter uma imagem',
        // ]);



        // if ($validator->fails()) {
        //     return $validator->errors()->all();
        // }

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

        //return response($response, 201);
        return redirect()->route('lista_seccao',201);
    }



    public function formupdate($id)
    {
        $seccao = Seccao::find($id);
        return view('editseccao')
            ->with('seccoes', $seccao);
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
    public function update(Request $request, Seccao $seccao)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nome_seccao' => 'string|max:60',
            'imagem_seccao' => 'image'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        if ($request->hasFile('imagem_seccao')) {

            $file = $request->file('imagem_seccao')->store('images');

            $data['imagem_seccao'] = $file;
        }



        $seccao->update($data);

        return redirect()->route('lista_seccao',201);
    }

    
    public function formdelete($id)
    {
        $seccao = Seccao::find($id);
        $seccao->delete();
        return redirect()->route('lista_seccao');
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
    public function destroy($id)
    {
        $seccao = Seccao::find($id);
        $seccao->delete();
        return redirect()->route('lista_seccao');
    }
}
