@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_seccao') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <br>
    <h2>Lista de Secções existentes</h2>
    <ul class="list-group2">
        
    @foreach($seccoes as $seccao)
    

        <li class="list-group-item">
            <img class="img-fluid_inserir" src="/uploads/{{$seccao->imagem_seccao}}" />
            <p>Secção:{{ $seccao->nome_seccao }}</p>
        </li>
   
    @endforeach
    </ul>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inserir Secção</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insert-seccao') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nome_seccao" class="col-md-4 col-form-label text-md-right">Nome da Secção</label>

                            <div class="col-md-6">
                                <input id="nome_seccao" type="text" class="form-control @error('nome_seccao') is-invalid @enderror" name="nome_seccao" value="{{ old('nome_seccao') }}"  autocomplete="nome_seccao" autofocus>

                                @error('nome_seccao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">File</label>

                            <div class="col-md-6">
                                <input id="imagem_seccao" type="file" class="form-control @error('imagem_seccao') is-invalid @enderror" name="imagem_seccao" value="{{ old('imagem_seccao') }}"  autocomplete="imagem_seccao">

                                @error('imagem_seccao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btnsubmeterseccao btn btn-primary">
                                    Submeter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection