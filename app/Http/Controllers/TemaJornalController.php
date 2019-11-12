<?php

namespace App\Http\Controllers;

use App\Tema;
use App\Jornal;
use App\TemaJornal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TemaJornalStoreRequest;
use App\Http\Requests\TemaJornalUpdateRequest;
use App\User;

class TemaJornalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idJUser = $request->user()->id;
        $userID = $request->user();
        $roleSession = $userID->role->name;

        
            $temajornal = TemaJornal::with('jornal')->with('tema')->get();
            // $userjornal = DB::table('tema_jornals')
            // ->join('jornals', 'tema_jornals.jornal_id', '=', 'jornals.id')
            // ->select('name_jornal', 'nome_tema', 'user_id')
            // ->distinct()->where('user_id',$idJUser)
            // ->get();
            //return $userjornal;
            $jornal = Jornal::where('user_id',$idJUser)->get();
           
            $tema = Tema::all();
            return view('feedtemajornal')
                ->with('temajornals', $temajornal)
                ->with('jornals', $jornal)
                ->with('temas', $tema);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;

        if ($userID->role->name === "reporter") {
            abort(401, 'lista_temajornal');
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            $temajornal = TemaJornal::with('jornal')->with('tema')->get();
            $jornal = Jornal::all();
            $tema = Tema::all();
            return view('insertemajornal')
            ->with('temajornals',$temajornal)
                ->with('jornals', $jornal)
                ->with('temas', $tema);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemaJornalStoreRequest $request)
    {
        $data = $request->all();

        $temajornal = TemaJornal::create(
            [
                'jornal_id' => $data['jornal_id'],
                'tema_id' => $data['tema_id'],
            ]
        );

        return redirect()->route('lista_temajornal', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function show(TemaJornal $temajornal)
    {
        return $temajornal;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $temajornal)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;

        if ($userID->role->name === "reporter") {
            abort(401, 'lista_temajornal');
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            $tema = Tema::all();
            $jornal = Jornal::all();
            $temajornal = TemaJornal::find($temajornal);

            return view('edittemajornal')
                ->with('temajornals', $temajornal)->with('temas', $tema)->with('jornals', $jornal);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function update(TemaJornalUpdateRequest $request, TemaJornal $temajornal)
    {
        $data = $request->all();

        $temajornal->update($data);

        return redirect()->route('lista_temajornal', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemaJornal  $temajornal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $temajornal)
    {
        $userID = $request->user();
        $roleSession = $userID->role->name;
        if ($userID->role->name === "reporter") {
            abort(401, 'lista_tema');
        } else if ($userID->role->name === "admin" || $roleSession === "editor") {
            $temajornal = TemaJornal::find($temajornal);
            $temajornal->delete();
            return redirect()->route('lista_temajornal');
        }
    }
}
