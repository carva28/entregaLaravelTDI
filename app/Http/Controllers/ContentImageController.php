<?php

namespace App\Http\Controllers;

use App\ContentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Jornal;
use Image;

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
        $imagenseditadas = ContentImage::with('jornal')->get();
        $response = [
            'data' => $imagenseditadas,
            'message' => 'Listagem de imagens editadas',
            'result' => 'OK'
        ];


        if ($response['result'] == 'OK') {
            return view('feededitarimagem')
                ->with('imagenseditadas', $response['data']);
            //return $response;
        } else {
            return 'Não encontramos nada';
        }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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


            $validator = Validator::make($data, [
                'ficheiro_image' => 'required|image',
                'jornal_id' => 'required|exists:jornals,id',
            ], [
                'ficheiro_image.required' => 'é necessário submeter uma imagem',
                'jornal_id.required' => 'é necessário saber qual é o jornal',
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }

            //Upload File
            $file = $request->file('ficheiro_image')->store('imagens_editadas');

            //Resize image here
            $imagemeditada = 'uploads/' . $file;

            // $img = Image::make($imagemeditada)->resize(200, 200, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            //$img = Image::make($imagemeditada)->greyscale()->brightness(60);
            $img = Image::make($imagemeditada)->greyscale();
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
            if ($response['result'] == 'OK') {
                return redirect()->route('lista_editarimagem', 201);
                    
            } else {
                return 'Ocorreu um erro';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContentImage  $contentImage
     * @return \Illuminate\Http\Response
     */
    public function show(ContentImage $contentImage)
    {
        //
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
