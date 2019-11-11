@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <a href="/" class="btn_back btn btn-xs btn-info pull-right">
            Home
        </a>
    </div>
    <div class="col-sm">
        <div class="col-md-2 col-md-offset-5">
            <a href="{{ route('insert-seccao') }}" class="btnsubmeterseccao btn btn-xs btn-info pull-right">
                Submeter nova seccção
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($seccoes as $seccao)


                <div class="card-header">
                    <div class="row">

                        <p class="seccao_p"> Secção:{{ $seccao->nome_seccao }}</p>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <img class="img-fluid" src="/uploads/{{$seccao->imagem_seccao}}" />
                            <div class="row2">
                            @auth  
                                @if (Auth::user()->role->name === "admin" ||
                                Auth::user()->role->name === "editor")
                                <div class="col-sm">
                                    <a href="{{ url('editar-seccao/'.$seccao->id) }}" class="btn_editarSmall btn btn-xs btn-info pull-right">
                                        Editar Secção
                                    </a>
                                </div>
                                <div class="col-sm">
                                    <a  href="{{ url('elima-seccao/'.$seccao->id) }}" class="btn_eliminaSmall btn btn-xs btn-info pull-right">
                                        Eliminar Secção
                                    </a>
                                </div>
                                @endif
                                @endauth
                            </div>
                        </div>



                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection