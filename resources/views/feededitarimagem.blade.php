@extends('layouts.app')
@section('content')
<div class="column">
    <a href="/" class="btn btn-xs btn-info pull-right">
        Home
    </a>
    <a href="{{ route('insert-editarimagem') }}" class="btn btn-xs btn-info pull-right">
        Editar Imagem
    </a>
</div>

@foreach($imagenseditadas as $imagenseditada)

<img class="editphotos img-fluid" src="uploads/imagens_editadas/{{$imagenseditada->ficheiro_image}}" />

@endforeach
@endsection