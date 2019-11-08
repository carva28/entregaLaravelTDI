@extends('layouts.app')
@section('content')

<form action="{{ route('insert-editarimagem') }}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" name="ficheiro_image" id="exampleInputFile">

        <img style="width:50%" src="/uploads/ficheiros_conteudos/W72iHGtDWUrcSnmumhwYzP5ckTAPDaMhhgunCNyo.jpeg" />
        <select name="jornal_id">

            @foreach($jornals as $jornal)
            <option selected value="{{ $jornal->id }}" select>
                {{ $jornal->name_jornal }}
            </option>
            @endforeach
        </select>
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection