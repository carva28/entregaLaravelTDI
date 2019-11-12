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

            <a href="{{ route('insert-temajornal') }}" class="btnsubmeterseccao btn-xs btn-info pull-right">
                Inserir tema
            </a>
        </div>
        <div class="col-md-auto">

            <a href="{{ route('lista_tema') }}" class="btnsubmeterseccao2 btn-xs btn-info pull-right">
                Inventa um tema
            </a>
        </div>

    </div>

    <br><br>
    <div class="row justify-content-md-center">

        <h2>Associar Temas ao Jornal</h2>
    </div>
  
    <div class="row justify-content-md-center">
       
        @foreach($temajornals as $temajornal)
        @foreach($jornals as $jornal)
        @if($temajornal->jornal_id === $jornal->id)
        <div class="colun_edit col-sm">
            <h5 class="card-title">Jornal {{$temajornal->jornal->name_jornal}}</h5>
            <h5 class="card-title">Tema {{$temajornal->tema->nome_tema}}</h5>
            <div class="row2">
                <div class="col-sm">
                    <a href="{{ url('editar-temajornal/'.$temajornal->id) }}" class="btn_editarSmall btn btn-primary">Editar</a>
                    <a href="{{ url('elima-temajornal/'.$temajornal->id) }}" class="btn_eliminaSmall btn btn-primary">Eliminar</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endforeach
    </div>
</div>

@endsection