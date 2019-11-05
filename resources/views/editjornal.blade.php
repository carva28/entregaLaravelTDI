@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-2 col-md-offset-5">
        <a href="{{ route('lista_jornais') }}" class="btn btn-xs btn-info pull-right">

            Voltar feed jornal

        </a>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Jornal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-jornal', $jornais->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="name_jornal" class="col-md-4 col-form-label text-md-right">Nome do Jornal</label>

                            <div class="col-md-6">
                                <input id="name_jornal" type="text" class="form-control @error('name_jornal') is-invalid @enderror" name="name_jornal" value="{{ $jornais->name_jornal }}" required  autofocus>

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
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $jornais->description }}" required  autofocus>{{$jornais->description}}
                                </textarea>

                                @error('description')
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
                                    <option selected value="{{ $jornais->user_id }}"> {{ $jornais->user->username }} </option>
                                </select>
                                @error('user_id')
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

                                <a href="{{ route('lista_jornais') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
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