@extends('layouts.app') @section('content')

<div class="container">
    <div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_conteudo') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <br>
    <div class="row_conteudos row justify-content-center">

        <div class="coluna_conteudos col-md-8">
            <div class="card_edit_seccao card">
                <div class="card-header">Editar Conteudo</div>

                <div class="card-body">
                <form method="POST" action="{{ route('update-conteudo', $conteudos->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="_method" value="put">


                        <div class="form-group row">
                            <label for="tipo_conteudo" class="col-md-4 col-form-label text-md-right">Tipo de conteudo</label>

                            <div class="col-md-6">
                                <select name="tipo_conteudo">

                                    @if($conteudos->tipo_conteudo==="Audio")
                                    <option selected value="Imagem"> Imagem</option>
                                    <option selected value="Video"> Video</option>
                                    <option selected value="{{ $conteudos->tipo_conteudo }}" select> {{ $conteudos->tipo_conteudo }}</option>

                                    @elseif($conteudos->tipo_conteudo==="Imagem")
                                    <option selected value="Audio"> Audio</option>
                                    <option selected value="Video"> Video</option>
                                    <option selected value="{{ $conteudos->tipo_conteudo }}" select> {{ $conteudos->tipo_conteudo }}</option>

                                    @elseif($conteudos->tipo_conteudo==="Video")

                                    <option selected value="Audio"> Audio</option>
                                    <option selected value="Imagem"> Imagem</option>
                                    <option selected value="{{ $conteudos->tipo_conteudo }}" select> {{ $conteudos->tipo_conteudo }}</option>
                                    @endif
                                </select>
                                @error('tipo_conteudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            @if(pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == 'mpga' || pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == 'mp3')

                            <div class="col-md-6">
                                <label for="ficheiro_conteudo" class="label_file_content col-md-4 col-form-label text-md-right">File</label>

                            </div>
                            <div class="col-md">
                                <audio controls>
                                    <source src="/uploads/{{$conteudos->ficheiro_conteudo}}" type="audio/mpeg"> Your browser does not support the audio tag.
                                </audio>
                                <input id="ficheiro_conteudo" type="file" class="form-control @error('ficheiro_conteudo') is-invalid @enderror" name="ficheiro_conteudo" value="{{ $conteudos->ficheiro_conteudo }}">
                                @error('ficheiro_conteudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endif
                            @if(pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == "mp4" ||
                            pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == "avi")

                            <div class="col-md-6">
                                <label for="ficheiro_conteudo" class="label_file_content col-md-4 col-form-label text-md-right">File</label>

                            </div>
                            <div class="col-md">
                                <video width="320" height="240" controls>
                                    <source src="/uploads/{{$conteudos->ficheiro_conteudo}}" type="video/mp4">

                                    Your browser does not support the video tag.
                                </video>
                                <input id="ficheiro_conteudo" type="file" class="form-control @error('ficheiro_conteudo') is-invalid @enderror" name="ficheiro_conteudo" value="{{ $conteudos->ficheiro_conteudo }}">
                                @error('ficheiro_conteudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endif
                            @if(pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == "png" ||
                            pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == "gif" ||
                            pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == "jpg" ||
                            pathinfo($conteudos->ficheiro_conteudo, PATHINFO_EXTENSION) == "jpeg")
                            <div class="col-md-6">
                                <label for="ficheiro_conteudo" class="label_file_content col-md-4 col-form-label text-md-right">File</label>

                            </div>
                            <div class="col-md">
                                <img class="img-fluid-content" src="/uploads/{{$conteudos->ficheiro_conteudo}}" />
                                <input id="ficheiro_conteudo" type="file" class="form-control @error('ficheiro_conteudo') is-invalid @enderror" name="ficheiro_conteudo" value="{{ $conteudos->ficheiro_conteudo }}">
                                @error('ficheiro_conteudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror </div>
                        </div>

                        @endif


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

                    <div class="form-group row">
                        <label for="noticia_id" class="col-md-4 col-form-label text-md-right">Noticia</label>

                        <div class="col-md-6">
                            <select name="noticia_id">

                                @foreach($noticias as $noticia):
                                @if($conteudos->noticia_id===$noticia->id)
                                <option selected value="{{ $conteudos->noticia_id }}"> {{ $conteudos->noticia->titulo_noticia }} </option>
                                @else
                                <option value="{{$noticia->id}}">{{$noticia->titulo_noticia}}</option>
                                @endif @endforeach
                            </select>

                            @error('noticia_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>

                    <div class="form_btn_group_edit_content form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btnsubmeterseccao btn btn-primary">
                                Editar
                            </button>

                            <a href="{{ route('lista_conteudo') }}" class="btn_eliminaSmall btncandelarseccao btn btn-xs btn-info pull-right">
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