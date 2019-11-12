@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <a href="/" class="btn_back btn btn-xs btn-info pull-right">
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

        @foreach($jornais as $jornal)
        <div class="col-sm">
            <div class="card">

                <div class="card-header">
                    <p class="jornalName seccao_p">{{ $jornal->name_jornal }}</p>
                    <div class="subhead">{{ $jornal->created_at }}</div>
                </div>
                {{-- asasa --}}
                <div class="card-body">
                    <div class="collumns1">
                        <div class="collumn1">
                            <div class="head1">
                                <span class="headline1 hl3">{{ $jornal->description }}</span>
                                <p>
                                    <span class="headline1 hl4">by <b>{{ $jornal->user->username }}</b></span>
                                </p>
                            </div>
                            
                        </div>
                        <div >
                            <a href="{{ url('listarnewsjornal/'.$jornal->id) }}" class="btn_vernoticias2 btn btn-xs btn-info pull-right">
                                Ver notícias
                            </a>
                            <div class="row2">

                                @auth
                                @if (Auth::user()->role->name === "admin" || Auth::user()->role->name === "editor")
                                <div class="col-sm">
                                    <a href="{{ url('editar-jornal/'.$jornal->id) }}" class="btn_editarSmall2 btn btn-xs btn-info pull-right">
                                        Editar Jornal
                                    </a>
                                </div>
                                @if (Auth::user()->role->name === "admin")
                                <div class="col-sm">
                                    <a href="{{ url('elima-jornal/'.$jornal->id) }}" class="btn_eliminaSmall2 btn btn-xs btn-info pull-right">
                                        Eliminar Jornal
                                    </a>
                                </div>
                                @endif
                                @endif
                                @endauth
                            </div>

                        </div>
                    </div>
                 
                </div>

            </div>
        </div>
        @endforeach

    </div>
    <div id="pagination2" class="row justify-content-md-center">
        <div class="pagination2 col-md-auto">
            {!! $jornais->links() !!}
        </div>

    </div>
</div>
@endsection