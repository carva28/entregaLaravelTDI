<?php

namespace App\Http\Controllers;

use App\Seccao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Secção management
 * 
 * 
 */
class SeccaoController extends Controller
{


    /**
     * Display a listing of the Personas that make cool movies.
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
        return view('mostraseca')
            ->with('seccoes', $seccao);  
    }

    public function form()
    {   
        $seccao = Seccao::all();
        return view('seccaoinsert')
        ->with('seccoes',$seccao);
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
            'nome_seccao' => 'required|unique:seccaos|string|max:60',
            'imagem_seccao' => 'required|image'
        ], [
            'nome_seccao.required' => 'é necessário ter um nome',
            'imagem_seccao.required' => 'é necessário ter uma imagem',
        ]);



        if ($validator->fails()) {
            return $validator->errors()->all();
        }

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
        return redirect()->route('lista_seccao');
    }

    

    public function formupdate($id)
    {   
        $seccao = Seccao::find($id);
        return view('editseccao')
        ->with('seccoes',$seccao);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona $persona
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

        return redirect()->route('lista_seccao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function formdelete($id)
    {   
        $seccao = Seccao::find($id);
        $seccao->delete();
        return redirect()->route('lista_seccao');
    }

    public function destroy($id)
    {   
        $seccao = Seccao::find($id);
        $seccao->delete();
        return redirect()->route('lista_seccao');
    }

}
