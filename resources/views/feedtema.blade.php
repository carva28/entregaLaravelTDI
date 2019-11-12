@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <a href="/" class="btn_back btn btn-xs btn-info pull-right">
            Home
        </a>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-auto">

            <a href="{{ route('insert-tema') }}" class="btnsubmeterseccao btn-xs btn-info pull-right">
                Inserir tema
            </a>
        </div>

    </div>

    <br><br>
    <div class="row justify-content-md-center">

        <h2>Temas para Jornal</h2>
    </div>
    <div class="row justify-content-md-center">

        @foreach($temas as $tema)
        <div class="colun_edit col-sm">
            <h5 class="card-title">{{$tema->nome_tema}}</h5>
            
            <div class="row2">
                <div class="col-sm">
                    <a href="{{ url('editar-tema/'.$tema->id) }}" class="btn_editarSmall btn btn-primary">Editar</a>
                    <a href="{{ url('elima-tema/'.$tema->id) }}" class="btn_eliminaSmall btn btn-primary">Eliminar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection