@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-2 col-md-offset-5">
        <a href="{{ route('lista_temajornal') }}" class="btn_back btn btn-xs btn-info pull-right">
            Voltar
        </a>

    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inserir uma associação de Tema ao jornal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-temajornal', $temajornals->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('put')}}

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="jornal_id" class="col-md-4 col-form-label text-md-right">Jornal</label>

                            <div class="col-md-6">
                                <select name="jornal_id">

                                    @foreach($jornals as $jornal):

                                    @if($temajornals->jornal_id == $jornal->id)
                                    <option value="{{$temajornals->jornal_id}}" selected>{{$temajornals->jornal->name_jornal}}</option>
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
                            <label for="tema_id" class="col-md-4 col-form-label text-md-right">Tema</label>

                            <div class="col-md-6">

                                <select name="tema_id">

                                    @foreach($temas as $tema):

                                    @if($temajornals->tema_id == $tema->id)
                                    <option value="{{$temajornals->tema_id}}" selected>{{$temajornals->tema->nome_tema}}</option>
                                    @else
                                    <option value="{{$tema->id}}">{{$tema->nome_tema}}</option>
                                    @endif
                                    @endforeach
                                </select>



                                @error('tema_id')
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