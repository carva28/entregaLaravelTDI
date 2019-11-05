@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-2 col-md-offset-5">
        <a href="{{ url('lista_noticia') }}" class="btn btn-xs btn-info pull-right">
            Voltar feed noticias
        </a>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Noticias</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-noticia', $noticias->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="titulo_noticia" class="col-md-4 col-form-label text-md-right">Nome da notícia</label>

                            <div class="col-md-6">
                                <input id="titulo_noticia" type="text" class="form-control @error('titulo_noticia') is-invalid @enderror" name="titulo_noticia" value="{{ $noticias->titulo_noticia }}" required autofocus>

                                @error('titulo_noticia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="corpo_noticia" class="col-md-4 col-form-label text-md-right">Corpo da Notícia</label>

                            <div class="col-md-6">
                                <textarea id="corpo_noticia" type="text" class="form-control @error('corpo_noticia') is-invalid @enderror" name="corpo_noticia" value="{{ $noticias->corpo_noticia }}" required autofocus>{{$noticias->corpo_noticia}}
                                </textarea>

                                @error('corpo_noticia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Utilizadores</label>

                            <div class="col-md-6">
                                <select name="user_id">

                                    @foreach($users as $user):
                                    @if($noticias->user_id===$user->id)
                                    <option selected value="{{ $noticias->user_id }}" select> {{ $noticias->user->username }} </option>
                                    @else
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('user_id')
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
                                    @foreach($jornais as $jornal):
                                    @if($noticias->jornal_id===$jornal->id)
                                    
                                    <option value="{{$noticias->jornal_id}}" select>{{$noticias->jornal->name_jornal}}</option>
                                    @else
                                    <option value="{{$jornal->id}}">{{$jornal->name_jornal}}</option>
                                    @endif
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
                                @if($noticias->seccao_id === $seccao->id)
                                <input class="input_radio_seccao" type="radio" name="seccao_id" value="{{$noticias->seccao->id}}" checked> <img class="img-fluid_inserir" src="/uploads/{{$noticias->seccao->imagem_seccao}}" /> {{$noticias->seccao->nome_seccao}} <br>
                                @else
                                <input class="input_radio_seccao" type="radio" name="seccao_id" value="{{$seccao->id}}" > <img class="img-fluid_inserir" src="/uploads/{{$seccao->imagem_seccao}}" /> {{$seccao->nome_seccao}} <br>                                
                                @endif
                                @endforeach
                                @error('seccao_id')
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

                                <a href="{{ route('lista_noticia') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
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