<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NoticiaController extends Controller
{
    /**
     * Display a listing of the Personas that make cool movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Noticia::all();
        $noticia = Noticia::with('jornal')->with('seccao')->get();
        
        $response = [
            'data' => $noticia,
            'message' => 'Listagem de Noticias',
            'result' => 'OK'
        ];

        return response($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @bodyParam  é necessário ter um nome
     * @bodyParam  é necessário ter descrição ter descrição
     * @bodyParam  é necessário saber quem é o responsável do Jornal
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $validator = Validator::make($data, [
            'titulo_noticia' => 'required|unique:noticias|string|max:60',
            'corpo_noticia' => 'required|string|max:255',
            'jornal_id' => 'required|exists:jornals,id',
            'seccao_id' => 'required|exists:seccaos,id',
            'user_id' => 'required|exists:users,id',
        ], [
            'titulo_noticia.required' => 'é necessário ter um titulo',
            'corpo_noticia.required' => 'é necessário ter texto',
            'jornal_id.required' => 'é necessário saber qual é o jornal',
            'seccao_id.required' => 'é necessário ter uma seccao',
            'user_id.required' => 'É necessário saber quem é o responsável pela noticia '
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

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
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return $noticia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'titulo_noticia' => 'required|string|max:60',
            'corpo_noticia' => 'required|string|max:255',
            'jornal_id' => 'required|exists:jornals,id',
            'seccao_id' => 'required|exists:seccaos,id',
            'user_id' => 'required|exists:users,id',

        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        
        $noticia->update($data);

        return response($noticia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return "deleted";
    }
}
