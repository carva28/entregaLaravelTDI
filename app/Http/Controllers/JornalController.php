<?php

namespace App\Http\Controllers;

use App\Jornal;
use App\User;
use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group API do Jornal 
 * 
 * APIs para gerir jornais
 * 
 */

class JornalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('role:guest|reporter|editor|admin')->only(['index']);
        $this->middleware('role:editor|admin')->only(['form','store','formupdate','update']);
        $this->middleware('role:admin')->only(['formdelete','destroy']);
    } */
    /**
     * Apresentação dos jornais associados aos editores.
     * Interpretação de quem pertence o jornal
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return Jornal::all();
        $jornal = Jornal::with('user')->get();
        $userID = $request->user();
        $response = [
            'data' => $jornal,
            'message' => 'Listagem de jornais',
            'result' => 'OK',
            'userauth'=>$userID
        ];

       
        //return response($response, 200);
        
        return view('feedjornal')
            ->with('jornais', $jornal)->with('userauth',$userID);
    }

    public function form()
    {
        $user = User::all();
        return view('inserjornal')
            ->with('users', $user);
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
    public function store(Request $request)
    {
        $data = $request->all();


        $validator = Validator::make($data, [
            'name_jornal' => 'required|unique:jornals|string|max:60',
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

        //return response($response, 201);
        return redirect()->route('lista_jornais', 201);
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

    public function formupdate($id)
    {
        $jornal = Jornal::find($id);

        return view('editjornal')
            ->with('jornais', $jornal);
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
    public function update(Request $request, Jornal $jornal)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name_jornal' => 'required|string|max:60',
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',

        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $jornal->update($data);

        //return response($jornal);
        return redirect()->route('lista_jornais', 200);
    }


    public function formdelete($id)
    {
        $jornal = Jornal::find($id);
        $jornal->delete();
        return redirect()->route('lista_jornais', 200);
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


    public function destroy($id)
    {
        $jornal = Jornal::find($id);
        $jornal->delete();
        return redirect()->route('lista_jornais', 200);
    }
}
