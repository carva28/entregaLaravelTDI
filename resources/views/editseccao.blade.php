@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-2 col-md-offset-5">
        <a href="{{ route('lista_seccao') }}" class="btn btn-xs btn-info pull-right">

            Voltar página seccção

        </a>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Secção</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-seccao', $seccoes->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="nome_seccao" class="col-md-4 col-form-label text-md-right">Nome da Secção</label>

                            <div class="col-md-6">
                                <img class="img-fluid" src="/uploads/{{$seccoes->imagem_seccao}}" />
                                <input id="nome_seccao" type="text" class="form-control @error('nome_seccao') is-invalid @enderror" name="nome_seccao" value="{{ $seccoes->nome_seccao}}" required autocomplete="nome_seccao" autofocus>

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
                                <input id="imagem_seccao" type="file" class="form-control @error('imagem_seccao') is-invalid @enderror" name="imagem_seccao" value="{{ $seccoes->imagem_seccao }}">

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

                                <a href="{{ route('lista_seccao') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection