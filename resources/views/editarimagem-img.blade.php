@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_editarimagem') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <div class="row justify-content-md-center">

        <h2>Imagens editadas</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="colun_edit col-sm">
            <img id="editphotosShow" class="img-fluid" src="../uploads/imagens_editadas/{{$conteudoeditadoImage}}" />
            @foreach ($jornais as $jornal)
            @if ($conteudoeditados->jornal_id == $jornal->id)
            <h5 class="name_jornal_img card-title">{{$jornal->name_jornal}}</h5>
            @endif
        @endforeach
        </div>
    </div>
</div>
@endsection