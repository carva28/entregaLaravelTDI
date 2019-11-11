@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_jornais') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inserir Jornal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insert-jornal') }}" enctype="multipart/form-data">
                        @csrf
                        <!--<input type="hidden" name="_method" value="put">-->
                        <!-- @method('put')-->
                        <div class="form-group row">
                            <label for="name_jornal" class="col-md-4 col-form-label text-md-right">Nome do Jornal</label>

                            <div class="col-md-6">
                                <input id="name_jornal" type="text" class="form-control @error('name_jornal') is-invalid @enderror" name="name_jornal" value="{{ old('name_jornal') }}" required autocomplete="name_jornal" autofocus>

                                @error('name_jornal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrição do Jornal</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            @if (Auth::user()->role->name === "admin")
                            <label for="seccao_id" class="col-md-4 col-form-label text-md-right">Utilizadores</label>

                            <div class="col-md-6">
                                <select name="user_id">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                                @elseif (Auth::user()->role->name === "editor")

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="invisible form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="titulo_noticia" autofocus>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @endif
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