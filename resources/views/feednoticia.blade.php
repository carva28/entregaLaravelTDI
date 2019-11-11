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
            <a href="{{ route('insert-noticia') }}" class="btnsubmeterseccao btn btn-xs btn-info pull-right">
                Inserir um nova noticia
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        @auth
        @if(Auth::user()->role->name === "admin" ||
        Auth::user()->role->name === "editor" ||
        Auth::user()->role->name === "reporter")
        @endif
        @endauth
        @if(!$noticias->isEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Corpo da notícia</th>
                    <th scope="col">Jornal</th>
                    <th scope="col">Secção</th>
                    <th scope="col">Repórter</th>
                    <th scope="col">Controlos</th>
                </tr>
            </thead>
            <tbody>

                @foreach($noticias as $noticia)

                <tr>
                    <td>{{ $noticia->titulo_noticia }}</td>
                    <td>{{ $noticia->corpo_noticia }}</td>
                    <td>{{ $noticia->jornal->name_jornal }}</td>
                    <td>{{ $noticia->seccao->nome_seccao }}
                        <img class="img-fluid-table" src="/uploads/{{$noticia->seccao->imagem_seccao}}" />
                    </td>
                    <td>{{ $noticia->user->username }}</td>
                    <td>

                        <div class="col-sm">
                            <a href="{{ url('editar-noticia/'.$noticia->id) }}" class="btn_editarSmall btn btn-xs btn-info pull-right">
                                Editar Notícia
                            </a>
                            @if (Auth::user()->role->name === "admin" ||
                            Auth::user()->role->name === "editor")
                            <a style="margin-top: 10px;" href="{{ url('elima-noticia/'.$noticia->id) }}" class="btn_eliminaSmall btn btn-xs btn-info pull-right">
                                Eliminar Notícia
                            </a>
                        </div>
                        @endif
                    </td>
                </tr>

                {{-- asasa --}}

                @endforeach
                @else
                <div class="colunanao column">
                    <p class="feed_p">Não tens conteúdo</p>
                    <img class="imgtable" id="sadnews" src="https://static.thenounproject.com/png/515962-200.png" />
                </div>
                @endif
    </div>
</div>
@endsection