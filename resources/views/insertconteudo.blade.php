@extends('layouts.app')

@section('content')
<div class="container"> <div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_conteudo') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">

        <div class="insert_content col-md-8">
            <div class="card">
                <div class="card-header">Inserir Conteudo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insert-conteudo') }}" enctype="multipart/form-data">
                        @csrf



                        <div class="form-group row">
                            <label for="tipo_conteudo" class="col-md-4 col-form-label text-md-right">Tipo de conteudo</label>

                            <div class="col-md-6">
                                <select name="tipo_conteudo">
                                    <option selected value="Audio"> Audio </option>
                                    <option selected value="Imagem"> Imagem </option>
                                    <option selected value="Video"> Video </option>
                                </select>
                                @error('tipo_conteudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ficheiro_conteudo" class="col-md-4 col-form-label text-md-right">Ficheiro (ex: MP3, MP4, PNG)</label>

                            <div class="col-md-6">
                                <input id="ficheiro_conteudo" type="file" class="form-control @error('ficheiro_conteudo') is-invalid @enderror" name="ficheiro_conteudo" value="{{ old('ficheiro_conteudo') }}" required autocomplete="ficheiro_conteudo">

                                @error('ficheiro_conteudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="noticia_id" class="col-md-4 col-form-label text-md-right">Noticia</label>

                            <div class="col-md-6">
                                <select name="noticia_id">
                                    @foreach($noticias as $noticia)
                                    <option value="{{$noticia->id}}">{{$noticia->titulo_noticia}}</option>
                                    @endforeach
                                </select>

                                @error('noticia_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            @auth

                            @if (Auth::user()->role->name === "admin")
                            <label for="seccao_id" class="col-md-4 col-form-label text-md-right">Utilizadores</label>

                            <div class="col-md-6">
                                <select name="user_id">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                                @elseif (Auth::user()->role->name === "editor" || Auth::user()->role->name === "reporter")

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="invisible form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="titulo_noticia" autofocus>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @endif
                                    @endauth
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="btn_insert_content col-md-6 offset-md-4">
                                    <button type="submit" class="btnsubmeterseccao btn btn-primary">
                                        Adicionar
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