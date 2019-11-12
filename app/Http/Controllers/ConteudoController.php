<?php

namespace App\Http\Controllers;

use App\Conteudo;
use App\Http\Requests\ConteudoUpdateRequest;
use App\Noticia;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group API do Conteudo
 * 
 * APIs para gerir conteudo
 * 
 */
class ConteudoController extends Controller
{
    /**
     * Apresentação dos conteúdos proudzidos por grandes repórteres.
     * Esta área destina-se à associação dos conteúdos audivisuais com as notícias
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userRole = $request->user()->role->name;
        if ($userRole === "admin") {
            $conteudo = Conteudo::with('noticia')->get();
        } else {
            $userID = $request->user()->id;
            $conteudo = Conteudo::with('noticia')->where('user_id', $userID)->get();
        }

        $response = [
            'data' => $conteudo,
            'message' => 'Listagem de conteudos',
            'result' => 'OK'
        ];

        return view('feedconteudo')
            ->with('conteudos', $response['data'])->with('messages', $response['message']);
    }

    public function form()
    {
        $noticia = Noticia::all();
        $users = User::all();
        return view('insertconteudo')
            ->with('noticias', $noticia)->with('users', $users);
    }


    // public function create()
    // {
    //     //
    // }

    /**
     * Inserir conteúdos na Base de dados.
     * Faz redirect da rota se armazenar os conteúdos corretamente 
     * esta verificação é realizada pelo http code 201
     * 
     * @bodyParam  tipo_conteudo string required necessário associar se é Audio, Video, ou Imagem
     * @bodyParam  ficheiro_conteudo string required o ficheiro para realizar upload do conteúdo em vários formatos(mpga,mp3,mp4,avi,jpg,jpeg,png,gif)
     * @bodyParam  noticia_id integer required perceber para que notícia irá o conteúdo
     * @bodyParam  user_id integer required identificar o produtor do conteúdo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $validator = Validator::make($data, [
            'tipo_conteudo' => 'required|string|max:60',
            'ficheiro_conteudo' => 'required|mimes:mpga,mp3,mp4,avi,jpg,jpeg,png,gif',
            'noticia_id' => 'required|exists:noticias,id',
            'user_id' => 'required|exists:users,id',
        ], [
            'titulo_noticia.required' => 'é necessário ter um nome',
            'ficheiro_conteudo.required' => 'é necessário ter video,imagem ou som',
            'noticia_id.required' => 'é necessário saber qual é a notícia',
            'user_id.required' => 'É necessário saber quem é o responsável pela noticia '
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $file = $request->file('ficheiro_conteudo')->store('ficheiros_conteudos');
        $data['ficheiro_conteudo'] = $file;

        $conteudo = Conteudo::create(
            [
                'tipo_conteudo' => $data['tipo_conteudo'],
                'ficheiro_conteudo' => $data['ficheiro_conteudo'],
                'noticia_id' => $data['noticia_id'],
                'user_id' => $data['user_id']
            ]
        );



        $userID = $request->user()->id;
        $todoscontents = Conteudo::with('noticia')->where('user_id', $userID)->get();
        $response = [
            'data' => $todoscontents,
            'message' => 'Conteudo adicionado',
            'result' => 'OK'
        ];

        return view('feedconteudo')
            ->with('conteudos', $response['data'])->with('messages', $response['message']);
        //return redirect()->route('lista_conteudo')->with('messages',$response['message']);


    }

    /**
     * Apresentação de uma noticia específica 
     * 
     * Apresentar uma notíca com base no ID
     *
     * @param  \App\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function show(Conteudo $conteudo)
    {
        //
    }



    public function formupdate($id)
    {
        $conteudo = Conteudo::find($id);
        $noticia = Noticia::all();
        $users = User::all();

        return view('editconteudo')
            ->with('conteudos', $conteudo)
            ->with('noticias', $noticia)->with('users', $users);
    }

    /**
     * Atualização de um conteúdo específica 
     * Ao editar o conteúdo presente no feed, é enviado o ID especifico do mesmo, nessa 
     * ligação, a função formupdate irá associar o id do conteudo apresentando toda a informação 
     * sobre o conteúdo
     * @queryParam tipo_conteudo required Tipo de conteúdo
     * @queryParam ficheiro_conteudo required Ficheiro do conteúdo
     * @queryParam noticia_id required Notícia
     * @queryParam user_id required Produtor do conteúdo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function update(ConteudoUpdateRequest $request,Conteudo $conteudo)
    {
        $data = $request->all();

        
        // $validator = Validator::make($data, [
        //     'tipo_conteudo' => 'string|max:60',
        //     'ficheiro_conteudo' => 'mimes:mpga,mp3,mp4,avi,jpg,jpeg,png,gif',
        //     'noticia_id' => 'exists:noticias,id',
        //     'user_id' => 'exists:users,id',
        // ]);

        // if ($validator->fails()) {
        //     return $validator->errors()->all();
        // }
        // if ($request->hasFile('ficheiro_conteudo')) {
        //     $file = $request->file('ficheiro_conteudo')->store('ficheiros_conteudos');
        //     $data['ficheiro_conteudo'] = $file;
        // }

        $userID = $request->user()->id;
        // $conteudo->update($data);
        $todoscontents = Conteudo::with('noticia')->where('user_id', $userID)->get();
        $response = [
            'data' => $todoscontents,
            'message' => 'Conteudo editado',
            'result' => 'OK'
        ];
        // return view('feedconteudo')
        //     ->with('conteudos', $response['data'])->with('messages', $response['message']);
        $data = $request->all();

        $conteudo->update($data);
        return view('feedconteudo')->with('conteudos', $response['data'])->with('messages', $response['message']);
        return redirect()->route('lista_conteudo');
        //return response($conteudo);
    }


    public function formdelete(Request $request, $id)
    {
        $conteudo = Conteudo::find($id);
        $conteudo->delete();

        $userID = $request->user()->id;
        $todoscontents = Conteudo::with('noticia')->where('user_id', $userID)->get();
        $response = [
            'data' => $todoscontents,
            'message' => 'Conteudo eliminado',
            'result' => 'OK'
        ];

        return view('feedconteudo')
            ->with('conteudos', $response['data'])->with('messages', $response['message']);
    }


    /**
     * Eliminar conteúdo específico
     * 
     * Ao clique no botão de eliminar conteúdo, o ID desse mesmo irá  
     * ser eliminado na base de dados
     *
     *
     * @param  \App\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Conteudo $conteudo)
    // {

    //     $conteudo->delete();
    //     return "deleted";
    // }
    public function destroy(Request $request, $id)
    {
        $conteudo = Conteudo::find($id);
        $conteudo->delete();

        $userID = $request->user()->id;
        $todoscontents = Conteudo::with('noticia')->where('user_id', $userID)->get();
        $response = [
            'data' => $todoscontents,
            'message' => 'Conteudo eliminado',
            'result' => 'OK'
        ];

        return view('feedconteudo')
            ->with('conteudos', $response['data'])->with('messages', $response['message']);
    }
}
