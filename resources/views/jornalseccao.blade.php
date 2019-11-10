@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar_jornal_news navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('listarnewsjornal/'.$jornais->id) }}">{{$jornais->name_jornal}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            @foreach($secjornals as $secjornal)
                @foreach($seccaos as $seccao)
                @if($seccao->id === $secjornal->seccao_id)
                <a class="nav-item nav-link" href="{{ url('lista_noticia_seccao/'.$seccao->id.'/'.$jornais->id) }}">{{$seccao->nome_seccao}}</a>
                @endif
                @endforeach
                @endforeach
                <a class="nav-item nav-link" href="/">
                    Voltar Home </p><span class="sr-only">(current)</span>
                </a>
            </div>
        </div>
    </nav>

    

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($noticiasseccao as $noticia)


                <div class="card-header">
                    <div class="column">

                        <p class="seccao_p"> {{ $noticia->titulo_noticia }}</p>
                    </div>
                </div>
                {{-- asasa --}}
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <!--  -->
                            <p class="seccao_p"> Noticia:{{ $noticia->corpo_noticia }}</p>
                            @foreach($seccaos as $seccao)
                            @if($seccao->id === $noticia->seccao_id)

                            <p class="seccao_p">
                                {{ $seccao->nome_seccao }}
                                <img class="img-fluid-table" src="/uploads/{{$seccao->imagem_seccao}}" />
                            </p>
                            @endif
                            @endforeach
                            @foreach($users as $user)
                            @if($user->id === $noticia->user_id)
                            <img class="img-fluid-profile" src="data:image/jpeg;base64,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" />
                            <p class="user_p">
                                {{ $user->username }}
                            </p>
                            @endif
                            @endforeach

                        </div>



                    </div>

                    @foreach($conteudos as $conteudo)
                    @if($noticia->id===$conteudo->noticia_id)

                    <div class="container">
                        <div class="row justify-content-center">


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

                            <img class="img-fluid-jornalnews" src="/uploads/{{$conteudo->ficheiro_conteudo}}" />

                            @endif


                            @if(pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "mp4" ||
                            pathinfo($conteudo->ficheiro_conteudo, PATHINFO_EXTENSION) == "avi")

                            <video width="320" height="240" controls>
                                <source src="/uploads/{{$conteudo->ficheiro_conteudo}}" type="video/mp4">

                                Your browser does not support the video tag.
                            </video>

                            @endif

                            @endif
                            @endforeach



                        </div>
                        <p class="p">
                            {{ $noticia->created_at }}
                        </p>
                    </div>





                    <div>
                    </div>
                    @endforeach
                </div>
               

            </div>
        </div>
        @endsection