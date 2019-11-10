<?php

namespace App\Http\Controllers\API;

use App\ContentImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jornal;
use App\Http\Requests\APIContentImageStoreRequest;
use Image;
class APIContentImageController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(APIContentImageStoreRequest $request)
    {
        if ($request->hasFile('ficheiro_image')) {
            $data = $request->all();
            $file = $request->file('ficheiro_image')->store('imagens_editadas');
            $imagemeditada = 'uploads/' . $file;
            $img = Image::make($imagemeditada)->resize(200, 200)->greyscale()->brightness(60);
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
