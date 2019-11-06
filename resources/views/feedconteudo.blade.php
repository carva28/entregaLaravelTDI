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
            <a href="{{ route('insert-conteudo') }}" class="btnsubmeterseccao btn btn-xs btn-info pull-right">
                Inserir um novo conteudo
            </a>
        </div>

        @if ($messages == "Conteudo eliminado")
        <div class="alert alert-danger">
            <h2>Conteudo eliminado</h2>

        </div>
        @elseif ($messages == "Conteudo adicionado")
        <div class="alert alert-success">
            <h2>Conteudo adicionado</h2>

        </div>
        @elseif ($messages == "Conteudo editado")
        <div class="alert alert-success">
            <h2>Conteudo editado</h2>

        </div>
        @elseif ($messages == "Listagem de conteudos")
        
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($conteudos as $conteudo)


                <div class="card-header">
                    <div class="row">
                        <p class="seccao_p">{{ $conteudo->tipo_conteudo }}</p>
                    </div>
                </div>
                {{-- asasa --}}
                <div class="card-body">
                    <div class="row">

                        <div class="feed_content col-md-4">
                            <ul class="list-group3">

                                <li class="lista_content list-group-item">
                                    @if(pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == 'mpga' ||
                                    pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == 'mp3')
                                    <audio controls>
                                        <source src="/uploads/{{$conteudo->ficheiro_conteudo}}" type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                    @endif
                                    @if(pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "png" ||
                                    pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "gif" ||
                                    pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "jpg" ||
                                    pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "jpeg")

                                    <img class="img-fluid" src="/uploads/{{$conteudo->ficheiro_conteudo}}" />
                                    @endif
                                    @if(pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "mp4" ||
                                    pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "avi")
                                    <video width="320" height="240" controls>
                                        <source src="/uploads/{{$conteudo->ficheiro_conteudo}}" type="video/mp4">

                                        Your browser does not support the video tag.
                                    </video>
                                    @endif


                                    <p>Utilizador: <b>{{ $conteudo->noticia->titulo_noticia }}</b></p>
                                    <p>Utilizador: <b>{{ $conteudo->user->username }}</b></p>
                                </li>
                            </ul>
                            <div class="row2">

                                <div class="col-sm">
                                    <a href="{{ url('editar-conteudo/'.$conteudo->id) }}" class="btn btn-xs btn-info pull-right">
                                        Editar Conteudo
                                    </a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn_elimina_seccao" href="{{ url('elima-conteudo/'.$conteudo->id) }}" class="btn btn-xs btn-info pull-right">
                                        Eliminar Conteudo

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