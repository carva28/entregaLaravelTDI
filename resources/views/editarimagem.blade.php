@extends('layouts.app')
@section('content')

<form action="{{ route('insert-editarimagem') }}" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">File</label>

        <div class="col-md-6">
            <input id="ficheiro_image" type="file" class="form-control @error('ficheiro_image') is-invalid @enderror" name="ficheiro_image" value="{{ old('ficheiro_image') }}" autocomplete="ficheiro_image">

            @error('ficheiro_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Escolher o Jornal</label>
            <div class="col-md-6">
                <select name="jornal_id">

                    @foreach($jornals as $jornal)
                    <option selected value="{{ $jornal->id }}" select>
                        {{ $jornal->name_jornal }}
                    </option>
                    @endforeach
                </select>

                @error('jornal_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    {{ csrf_field() }}
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Adiconar
            </button>
        </div>
    </div>
</form>

@endsection