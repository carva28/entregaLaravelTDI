@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-2 col-md-offset-5">
        <a href="{{ route('lista_tema') }}" class="btn_back btn btn-xs btn-info pull-right">
            Voltar página seccção
        </a>

    </div>
    <div class="row justify-content-center">

<div class="col-md-8">
    <div class="card">
        <div class="card-header">Editar Tema</div>

        <div class="card-body">
            <form method="POST" action="{{ route('update-tema', $temas->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="_method" value="put">
                <div class="form-group row">
                    <label for="nome_tema" class="col-md-4 col-form-label text-md-right">Nome Tema</label>

                    <div class="col-md-6">
                        <input id="nome_tema" type="text" class="form-control @error('nome_tema') is-invalid @enderror" name="nome_tema" value="{{ $temas->nome_tema}}" required autocomplete="nome_tema" autofocus>

                        @error('nome_tema')
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

                        <a href="{{ route('lista_tema') }}" class="btn_eliminaSmall btn btn-xs btn-info pull-right">
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