<?php

namespace App\Http\Controllers\API;

use App\Conteudo;
use App\Noticia;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\APIConteudoStoreRequest;
use App\Http\Requests\APIConteudoUpdateRequest;

/**
 * @group API do Conteudo
 * 
 * APIs para gerir conteudo
 * 
 */
class APIConteudoController extends Controller
{
    /**
     * Apresentação dos conteúdos proudzidos por grandes repórteres.
     * Esta área destina-se à associação dos conteúdos audivisuais com as notícias
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conteudo = Conteudo::with('noticia')->get();
        $response = [
            'data' => $conteudo,
            'message' => 'Listagem de conteudos',
            'result' => 'OK'
        ];

        return response($response,200);
       
    }

    public function form()
    {
        $noticia = Noticia::all();
        $users = User::all();

        $response = [
            'noticias' => $noticia,
            'users' => $users,
            'message' => 'Form de inserir conteudos',
            'result' => 'OK'
        ];
        return response($response);
            
    }

    
    // public function create()
    // {
    //     //
    // }

    /**
     * Inserir conteúdos na Base de dados.
     * 
     * @bodyParam  tipo_conteudo string required necessário associar se é Audio, Video, ou Imagem
     * @bodyParam  ficheiro_conteudo string required o ficheiro para realizar upload do conteúdo em vários formatos(mpga,mp3,mp4,avi,jpg,jpeg,png,gif)
     * @bodyParam  noticia_id integer required perceber para que notícia irá o conteúdo
     * @bodyParam  user_id integer required identificar o produtor do conteúdo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APIConteudoStoreRequest $request)
    {
        $data = $request->all();

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

        

        $conteudo = Conteudo::with('noticia')->get();
        $response = [
            'data' => $conteudo,
            'message' => 'Conteudo adicionado',
            'result' => 'OK'
        ];
        

        return response($response, 201);
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

        $response = [
            'conteudos' => $conteudo,
            'noticias' => $noticia,
            'users' => $users,
            'message' => 'Conteudo para atualizar',
            'result' => 'OK'
        ];

        return reponse($response,200);
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
    public function update(APIConteudoUpdateRequest $request, Conteudo $conteudo)
    {
        $data = $request->all();

        
        if ($request->hasFile('ficheiro_conteudo')) {
            $file = $request->file('ficheiro_conteudo')->store('ficheiros_conteudos');
            $data['ficheiro_conteudo'] = $file;
        }

        $conteudo->update($data);

        $todoscontents = Conteudo::with('noticia')->get();
        $response = [
            'data' => $todoscontents,
            'message' => 'Conteudo editado',
            'result' => 'OK'
        ];
        
        
        return response($conteudo,201);
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
    public function destroy(Conteudo $conteudo)
    {
        $conteudo->delete();
        
        $response = [
            'message' => 'Conteudo eliminado',
            'result' => 'OK'
        ];
        

        return response($response);
        
    }
}
