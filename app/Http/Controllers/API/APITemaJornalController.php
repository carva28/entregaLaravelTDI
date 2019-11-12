<?php

namespace App\Http\Controllers\API;

use App\Jornal;
use App\TemaJornal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\APITemaJornalStoreRequest;
use App\Http\Requests\APITemaJornalUpdateRequest;
use App\Tema;

/**
 * @group API do tema do jornal
 * 
 *  APIs para gerir os temas dos jornais
 */
class APITemaJornalController extends Controller
{
    /**
     * Apresentação das notícias realizadas por grandes repórteres.
     * Interpretação apresentação da associção do tema ao respetivo jornal
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temajornal = TemaJornal::with('jornal')->with('tema')->get();

        $response = [
            'data' => $temajornal,
            'message' => 'Listagem do tema do respetivo jornal',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * Apresentação do formulário para associar um tema a um jornal.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornal = Jornal::all();
        $tema = Tema::all();
        $response = [
            'jornais' => $jornal,
            'tema' => $tema,
            'message' => 'Form Tema Jornal',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * * Inserir a associação do tema ao jornal na Base de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APITemaJornalStoreRequest $request)
    {
        $data = $request->all();

        $temajornal = TemaJornal::create(
            [
                'jornal_id' => $data['jornal_id'],
                'tema_id' => $data['tema_id'],
            ]
        );
        $response = [
            'data' => $temajornal,
            'message' => 'Associação foi realizada com sucesso',
            'result' => 'OK'
        ];

        return response($response, 201);
    }

   /**
     * Apresentação de uma associação específica.
     *
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function show(TemaJornal $temajornal)
    {
        return $temajornal;
    }

    /**
     * Apresentação do formulário para editar associação.
     *
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function edit(TemaJornal $temajornal)
    {
        $temajornal2 = TemaJornal::find($temajornal);
        $jornal = Jornal::all();
        $tema = Tema::all();
        $response = [
            'temajornal'=>$temajornal2,
            'jornais' => $jornal,
            'tema' => $tema,
            'message' => 'Form Tema Jornal para editar associação',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * 
     * Atualização de uma associação específica 
     *
     * @queryParam jornal_id required Saber qual é o jornal
     * @queryParam tema_id required Saber qual é o tema
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function update(APITemaJornalUpdateRequest $request, TemaJornal $temajornal)
    {
        $data = $request->all();

        $temajornal->update($data);
        
        $response = [
            'data' =>  $temajornal,
            'message' => 'Associação editada',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemaJornal $temajornal)
    {
        $temajornal->delete();

        $response = [
            'message' => 'Associação eliminada',
            'result' => 'OK'
        ];

        return response($response, 200);
    }
}
