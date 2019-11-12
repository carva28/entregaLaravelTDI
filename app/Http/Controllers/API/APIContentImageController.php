<?php

namespace App\Http\Controllers\API;

use App\ContentImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jornal;
use App\Http\Requests\APIContentImageStoreRequest;
use Image;

/**
 * @group API da edição de fotografias 
 * 
 * APIs para editar e ver fotografias
 * 
 */
class APIContentImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:guest|reporter|editor|admin')->only(['index']);
        $this->middleware('role:editor|admin')->only(['form','store','formupdate','update']);
        $this->middleware('role:admin')->only(['formdelete','destroy']);
    }
    /**
     * Apresentação das imagens editadas
     * Interpretação ver as imagens que já foram editadas limitas a número de páginas
     * HTTP Response
     * @bodyParam 200 integer OK -> mostra a informação
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenseditadas = ContentImage::with('jornal')->get();
        $response = [
            'imagens' => $imagenseditadas,
            'message' => 'Listagem de imagens editadas',
            'result' => 'OK'
        ];
        return response($response, 200);
    }

    /**
     * Formulário para inserir uma imagem editada
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jornal = Jornal::all();
        $response = [
            'jornais' => $jornal,
            'message' => 'Listagem de imagens editadas',
            'result' => 'OK'
        ];
        return response($response, 200);
    }

    /**
     * Inserir uma imagem editada na Base de dados.
     *
     * 
     * @bodyParam  ficheiro_image string required Enviar a Image
     * @bodyParam  jornal_id number required Enviar o jornal
     * @bodyParam  effectvalue string required Enviar valor do efeito para colocar na Image
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APIContentImageStoreRequest $request)
    {
        if ($request->hasFile('ficheiro_image')) {


            $data = $request->all();

            $file = $request->file('ficheiro_image')->store('imagens_editadas');

            $imagemeditada = 'uploads/' . $file;
            if ($data["effectvalue"] === "grey") {
                $img = Image::make($imagemeditada)->greyscale();
            } else if ($data["effectvalue"] === "contrast200") {
                $img = Image::make($imagemeditada)->contrast(100);
            } else if ($data["effectvalue"] === "briho130") {
                $img = Image::make($imagemeditada)->brightness(20);
            } else if ($data["effectvalue"] === "briho80") {
                $img = Image::make($imagemeditada)->brightness(-40);
            } else if ($data["effectvalue"] === "greybrightness20") {
                $img = Image::make($imagemeditada)->brightness(30)->greyscale();
            } else if ($data["effectvalue"] === "none") {
                $img = Image::make($imagemeditada)->brightness(0);
            }

            $img->save($imagemeditada);

            $urlImg = $img->basename;

            $imagenseditadas = ContentImage::create(
                [
                    'ficheiro_image' => $urlImg,
                    'jornal_id' => $data['jornal_id'],
                ]
            );
            $response = [
                'data' => $imagenseditadas,
                'message' => 'Imagem editada com sucesso foi adicionada',
                'result' => 'OK'
            ];
            return response($response, 201);
        }
    }

    /**
     * Apresentação de uma imagem editada específica.
     *
     * @bodyParam  conteudoeditados array required Envia imagem, o id do jornal e data de criação
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function show(ContentImage $contentImage)
    {
        $image = ContentImage::find($contentImage)->with('jornais');
        return view('editarimagem-img')->
        with('conteudoeditados',$image);
    }

    /**
     * Não atualiza
     *
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentImage $contentImage)
    {
        //
    }

    /**
     * Não atualiza
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentImage $contentImage)
    {
        //
    }

    /**
     * Eliminar uma imagem editada específica
     * 
     * Não elimina 
     *
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentImage $contentImage)
    {
        //
    }
}
