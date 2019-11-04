<?php

namespace App\Http\Controllers;

use App\Jornal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Jornal management
 * 
 * 
 */

class JornalController extends Controller
{
    /**
     * Display a listing of the Jornals that made by cool journalists.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Jornal::all();
        $jornal = Jornal::with('user')->get();

        $response = [
            'data' => $jornal,
            'message' => 'Listagem de jornais',
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
            'name_jornal' => 'required|unique:jornals|string|max:60', //campo que é obrigatório ser preenchido | para validar só strings e com máximo de 255 caracteres; unique permite ser único:nome_da_tabela
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ], [
            'name_jornal.required' => 'é necessário ter um nome',
            'description.required' => 'é necessário ter descrição',
            'user_id' => 'É necessário saber quem é o responsável do Jornal '
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

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
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Jornal $jornal)
    {
        return $jornal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jornal $jornal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornal $jornal)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name_jornal' => 'required|unique:jornals|string|max:60',
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',

        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $jornal->update($data);

        return response($jornal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornal $jornal)
    {
        $jornal->delete();
        return "deleted";
    }
}
