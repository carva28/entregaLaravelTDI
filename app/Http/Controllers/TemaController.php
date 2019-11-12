<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;
use App\Http\Requests\TemaStoreRequest;
use App\Http\Requests\TemaUpdateRequest;

class TemaController extends Controller
{
    /**
     * Apresenta dos temas de personalização dos jornais
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tema = Tema::all();
        return view('feedtema')
            ->with('temas', $tema);
    }

    /**
     * Formulário para adicionar tema
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;

        if ($userID->role->name === "reporter") {
            abort(401, 'lista_tema');
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            return view('insertema');
        }
    }

    /**
     * Inserir um tema na Base de dados.
     * 
     * @bodyParam  nome_tema string required Enviar o nome do tema que seja único
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemaStoreRequest $request)
    {
        $data = $request->all();

        $tema = Tema::create(
            [
                'nome_tema' => $data['nome_tema'],
            ]
        );

        return redirect()->route('lista_tema', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        return $tema;
    }

    /**
     * Formulário de editar um tema.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $tema)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;

        if ($userID->role->name === "reporter") {
            abort(401, 'lista_tema');
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            $temavar = Tema::find($tema);

            return view('edittema')
                ->with('temas', $temavar);
        }
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
    public function update(TemaStoreRequest $request, Tema $tema)
    {
        $data = $request->all();

        $tema->update($data);

        return redirect()->route('lista_tema', 200);
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
    public function destroy(Request $request,$tema)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;
        if ($userID->role->name === "reporter") {
            abort(401, 'lista_tema');
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            $tema = Tema::find($tema);
            $tema->delete();
            return redirect()->route('lista_tema');
        }
        
    }
}
