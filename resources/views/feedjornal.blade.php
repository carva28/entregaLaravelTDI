@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <a href="/" class="btn btn-xs btn-info pull-right">
            Home
        </a>
    </div>
    <div class="col-sm">
        <div class="col-md-2 col-md-offset-5">
            <a href="{{ route('insert-jornal') }}" class="btnsubmeterseccao btn btn-xs btn-info pull-right">
                Inserir um novo jornal
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($jornais as $jornal)


                <div class="card-header">
                    <div class="row">
                        <p class="seccao_p">{{ $jornal->name_jornal }}</p>
                    </div>
                </div>
                {{-- asasa --}}
                <div class="card-body">
                    <div class="row">

                        <div class="feed_content col-md-4">
                            <ul class="list-group3">

                                <li class="lista_content list-group-item">
                                    <p>Description:</p>
                                    <p>{{ $jornal->description }}</p>
                                    <p>Editor: <b>{{ $jornal->user->username }}</b></p>
                                </li>
                            </ul>
                            <a href="{{ url('listarnewsjornal/'.$jornal->id) }}" class="btn_vernoticias btn btn-xs btn-info pull-right">
                                        Ver notícias
                                    </a>
                            <div class="row2">
                                
                                    
                                
                                <div class="col-sm">
                                    <a href="{{ url('editar-jornal/'.$jornal->id) }}" class="btn btn-xs btn-info pull-right">
                                        Editar Secção
                                    </a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn_elimina_seccao" href="{{ url('elima-jornal/'.$jornal->id) }}" class="btn btn-xs btn-info pull-right">
                                        Eliminar Secção
                                    </a>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection