<?php

namespace App\Http\Controllers;

use Image;
use App\Jornal;
use App\ContentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ContentImageStoreRequest;
use Illuminate\Support\Facades\DB;
class ContentImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $jornal = Jornal::all();
        //$all=DB::table('jornals')->paginate(4);
        //dd($all);
        //$imagenseditadas = ContentImage::with('jornal')->get();
        $imagenseditadas = ContentImage::with('jornal')->paginate(8);
        $response = [
            'data' => $imagenseditadas,
            'jornais' => $jornal,
            'message' => 'Listagem de imagens editadas',
            'result' => 'OK'
        ];

        return view('feededitarimagem')
            ->with('imagenseditadas', $response['data'])->with('jornais', $response['jornais']);
        //return $response;
    }


    public function form()
    {
        $jornal = Jornal::all();

        return view('editarimagem')
            ->with('jornals', $jornal);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornal = Jornal::all();

        return view('editarimagem')
            ->with('jornals', $jornal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentImageStoreRequest $request)
    {
        if ($request->hasFile('ficheiro_image')) {

            
            // //get filename with extension
            // $filenamewithextension = $request->file('ficheiro_image')->getClientOriginalName();

            // //get filename without extension
            // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            // //get file extension
            // $extension = $request->file('ficheiro_image')->getClientOriginalExtension();

            // //filename to store
            // $filenametostore = $filename . '_' . time() . '.' . $extension;
            $data = $request->all();
            
            //Upload File
            $file = $request->file('ficheiro_image')->store('imagens_editadas');

            //Resize image here
            $imagemeditada = 'uploads/' . $file;

            // $img = Image::make($imagemeditada)->resize(200, 200, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            //$img = Image::make($imagemeditada)->greyscale()->brightness(60);
            if($data["effectvalue"] === "grey"){
                $img = Image::make($imagemeditada)->greyscale();
            }else if($data["effectvalue"] === "contrast200"){
                $img = Image::make($imagemeditada)->contrast(100);
            }else if($data["effectvalue"] === "briho130"){
                $img = Image::make($imagemeditada)->brightness(20);
            }else if($data["effectvalue"] === "briho80"){
                $img = Image::make($imagemeditada)->brightness(-40);
            }else if($data["effectvalue"] === "greybrightness20"){
                $img = Image::make($imagemeditada)->brightness(30)->greyscale();
            }else if($data["effectvalue"] === "none"){
                $img = Image::make($imagemeditada)->brightness(0);
            }
            
            $img->save($imagemeditada);

            $urlImg = $img->basename;
            // $file = $request->file('ficheiro_image')->store('imagens_editadas');
            // $data['ficheiro_image'] = $file;
            // $contentFile = $data['ficheiro_image'];

            //$img = Image::make($contentFile)->resize(100, 100);

            $imagenseditadas = ContentImage::create(
                [
                    'ficheiro_image' => $urlImg,
                    'jornal_id' => $data['jornal_id'],
                ]
            );



            //$imagenseditadas = ContentImage::with('jornal')->get();
            $response = [
                'data' => $imagenseditadas,
                'message' => 'Imagem editada com sucesso foi adicionada',
                'result' => 'OK'
            ];

            return redirect()->route('lista_editarimagem', 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function show($contentImage)
    {   
        $jornal = Jornal::all();
        $image = ContentImage::find($contentImage);
        
        return view('editarimagem-img')->
        with('conteudoeditados',$image)
        ->with('conteudoeditadoImage',$image->ficheiro_image)
        ->with('jornais',$jornal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentImage $contentImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentImage $contentImage)
    {
        //
    }
}
