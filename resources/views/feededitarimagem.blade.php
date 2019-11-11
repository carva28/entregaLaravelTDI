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

            <a href="{{ route('insert-editarimagem') }}" class="btnsubmeterseccao btn-xs btn-info pull-right">
                Inserir e editar imagem
            </a>
        </div>

    </div>

    <br><br>
    <div class="row justify-content-md-center">

        <h2>Imagens editadas</h2>
    </div>
    <div class="row justify-content-md-center">

        @foreach($imagenseditadas as $imagenseditada)

        @foreach ($jornais as $jornal)
        @if ($imagenseditada->jornal_id == $jornal->id)
        <div class="colun_edit col-sm">
            <img class="editphotos img-fluid" src="uploads/imagens_editadas/{{$imagenseditada->ficheiro_image}}" />
            <h5 class="card-title">{{$jornal->name_jornal}}</h5>
            <a href="{{ url('editarimagem-img/'.$imagenseditada->id) }}" class="btn_editar btn btn-primary">Editar</a>
        </div>
        @endif
        @endforeach
        @endforeach
    </div>
    <div id="pagination" class="row justify-content-md-center">
        <div class="col-md-auto">
            {!! $imagenseditadas->links() !!}
        </div>

    </div>
</div>

@endsection