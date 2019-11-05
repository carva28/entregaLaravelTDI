<?php

namespace App\Http\Controllers;

use App\Noticia;
use App\Jornal;
use App\Seccao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
/**
 * @group Noticia management
 * 
 * 
 */

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
        $noticia = Noticia::with('jornal')->with('seccao')->with('user')->get();
       
        $response = [
            'data' => $noticia,
            'message' => 'Listagem de Noticias',
            'result' => 'OK'
        ];

        //return response($response, 200);
        return view('feednoticia')
            ->with('noticias', $noticia);  
    }

    public function form()
    {   
        $jornal = Jornal::all();
        $seccao = Seccao::all();
        $users = User::all();
        return view('insertnoticia')
        ->with('jornais', $jornal)->with('seccaos', $seccao)->with('users', $users);
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

        //return response($response, 201);
        return redirect()->route('lista_noticia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return $noticia;
    }

    public function formupdate($id)
    {   
        $noticia = Noticia::find($id);
        $jornal = Jornal::all();
        $seccao = Seccao::all();
        $users = User::all();
        
        return view('editnoticia')
        ->with('noticias',$noticia)
        ->with('jornais', $jornal)->with('seccaos', $seccao)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticium)
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
        $noticium->update($data);

        //return response($noticium);
        return redirect()->route('lista_noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $personas
     * @return \Illuminate\Http\Response
     */
    public function formdelete($id)
    {   
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect()->route('lista_noticia');
    }

    public function destroy($id)
    {   
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect()->route('lista_noticia');
    }

    public function juncao($id)
    {   
        $noticia = DB::table('noticias')->where('jornal_id',$id)->get();
        $jornal = Jornal::find($id);
        $seccao = Seccao::all();
        $users = User::all();
        return view('jornalnews')
            ->with('noticias', $noticia)->with('jornais', $jornal)->with('seccaos', $seccao)->with('users', $users);
    }
}
