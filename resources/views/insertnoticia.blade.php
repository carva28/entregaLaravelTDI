@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_noticia') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inserir Noticia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insert-noticia') }}" enctype="multipart/form-data">
                        @csrf
                        <!--<input type="hidden" name="_method" value="put">-->
                        <!-- @method('put')-->
                        <div class="form-group row">
                            <label for="titulo_noticia" class="col-md-4 col-form-label text-md-right">Título da notícia</label>

                            <div class="col-md-6">
                                <input id="titulo_noticia" type="text" class="form-control @error('titulo_noticia') is-invalid @enderror" name="titulo_noticia" value="{{ old('titulo_noticia') }}" required autocomplete="titulo_noticia" autofocus>

                                @error('titulo_noticia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="corpo_noticia" class="col-md-4 col-form-label text-md-right">Corpo da notícia</label>

                            <div class="col-md-6">
                                <textarea id="corpo_noticia" type="text" class="form-control @error('corpo_noticia') is-invalid @enderror" name="corpo_noticia" value="{{ old('corpo_noticia') }}" required autocomplete="corpo_noticia" autofocus></textarea>

                                @error('corpo_noticia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="jornal_id" class="col-md-4 col-form-label text-md-right">Jornal</label>

                            <div class="col-md-6">
                                <select name="jornal_id">
                                    @foreach($jornais as $jornal)
                                    <option value="{{$jornal->id}}">{{$jornal->name_jornal}}</option>
                                    @endforeach
                                </select>


                                @error('jornal_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seccao_id" class="col-md-4 col-form-label text-md-right">Secção</label>

                            <div class="col-md-6">

                                @foreach($seccaos as $seccao)
                                <input class="input_radio_seccao" type="radio" name="seccao_id" value="{{$seccao->id}}" checked>
                                <img class="img-fluid_inserir" src="/uploads/{{$seccao->imagem_seccao}}" /> {{$seccao->nome_seccao}} <br>

                                @endforeach



                                @error('seccao_id')
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
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btnsubmeterseccao btn btn-primary">
                                        Adiconar
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