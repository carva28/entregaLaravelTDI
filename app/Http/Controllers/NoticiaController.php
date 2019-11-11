<?php

namespace App\Http\Controllers;

use App\User;
use App\Jornal;
use App\Seccao;
use App\Noticia;
use App\Conteudo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\NoticiaStoreRequest;
use App\Http\Requests\NoticiaUpdateRequest;

/**
 * @group API da Noticia
 * 
 *  APIs para gerir notícias e ver as respetivas secções  e jornais
 */

class NoticiaController extends Controller
{
    /**
     * Apresentação das notícias realizadas por grandes repórteres.
     * Interpretação de quem fez a notícia, para que jornal é, e qual a secção que se destina
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $userRole = $request->user()->role->name;
        if ($userRole === "admin") {
            $noticia = Noticia::with('jornal')->with('seccao')->with('user')->get();
         } else {
            $userID = $request->user()->id;
            $noticia = Noticia::with('jornal')->with('seccao')->with('user')->where('user_id', $userID)->get();;
        }
        $response = [
            'data' => $noticia,
            'message' => 'Listagem de Noticias',
            'result' => 'OK'
        ];

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
     * Inserir uma notícia na Base de dados.
     * Faz redirect da rota se armazenar os dados corretamente esta 
     * verificação é realizada pelo http code 201
     * 
     * @bodyParam  titulo_noticia string required necessário ter um nome para a notícia
     * @bodyParam  corpo_noticia string required necessário ter um corpo de notícia
     * @bodyParam  jornal_id integer required necessário saber a que Jornal pertence esta notícia
     * @bodyParam  seccao_id integer required necessário saber a secção da notícia
     * @bodyParam  user_id integer required necessário saber quem é o repórter do Jornal
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaStoreRequest $request)
    {
        $data = $request->all();

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

        return redirect()->route('lista_noticia', 201);
    }

    /**
     * Apresentação de uma noticia específica 
     * 
     * Apresentar uma notíca com base no ID
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
            ->with('noticias', $noticia)
            ->with('jornais', $jornal)->with('seccaos', $seccao)->with('users', $users);
    }

    /**
     * Atualização de uma noticia específica 
     *  Ao editar uma notícia presente no feed, é enviado o ID especifico do mesmo, nessa 
     * ligação, a função formupdate irá associar o id da notícia apresentando toda a informação 
     * sobre a mesma
     * @queryParam titulo_noticia required Título da notícia
     * @queryParam corpo_noticia required Corpo da notícia
     * @queryParam jornal_id required Jornal da respetiva notícia
     * @queryParam seccao_id required Secção da respetiva notícia
     * @queryParam user_id required Repórter da notícia
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia $noticia
     * @return \Illuminate\Http\Response 
     */
    public function update(NoticiaUpdateRequest $request, Noticia $noticium)
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
        return redirect()->route('lista_noticia', 200);
    }


    public function formdelete($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect()->route('lista_noticia');
    }
    /**
     * Eliminar uma notícia específica
     * 
     * Ao clique no botão de eliminar notícia, o ID dessa mesma irá  
     * ser eliminado da base de dados
     *
     * @param  \App\Noticia  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect()->route('lista_noticia');
    }

    /**
     * ##Aceder às notícias do respetivo Jornal
     * Ao editar uma noticia no feed, enviamos o ID especifico da notícia, com essa 
     * 
     *
     * 
     * 
     */

    public function juncao($id)
    {
        $noticia = DB::table('noticias')->where('jornal_id', $id)->whereNull('deleted_at')->get();
        $secjornal = Noticia::with('seccao')->select('seccao_id')->distinct()->where('jornal_id', $id)->get();

        $jornal = Jornal::find($id);
        $seccao = Seccao::all();
        $users = User::all();
        $conteudo = Conteudo::with('noticia')->get();
        return view('jornalnews')
            ->with('noticias', $noticia)
            ->with('jornais', $jornal)
            ->with('seccaos', $seccao)
            ->with('users', $users)
            ->with('conteudos', $conteudo)
            ->with('secjornals', $secjornal);
    }

    public function jornalseccao($idSeccao, $idJornal)
    {
        $shownoticias = DB::table('noticias')->where('jornal_id', $idJornal)
            ->where('seccao_id', $idSeccao)->get();
        //return $shownoticias;
        $seccao = Seccao::all();
        $users = User::all();
        $secjornal = Noticia::with('seccao')->select('seccao_id')->distinct()->where('jornal_id', $idJornal)->get();
        $conteudo = Conteudo::with('noticia')->get();
        $jornal = Jornal::find($idJornal);
        return view('jornalseccao')
            ->with('jornais', $jornal)
            ->with('conteudos', $conteudo)
            ->with('seccaos', $seccao)
            ->with('users', $users)
            ->with('secjornals', $secjornal)
            ->with('noticiasseccao', $shownoticias)
            ->with('seccaoatual', $idSeccao);
    }
}
