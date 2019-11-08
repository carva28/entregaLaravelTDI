<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NotíciArte</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            background: rgb(238,174,202);
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            color: white;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            transition: 0.5s;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .links a:hover{
            font-size: 18px;
            color:white;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                NotíciArte App
            </div>

            <div class="links">
                <a href="{{ route('lista_seccao') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                    Ver secções do jornal
                </a>
                <a href="{{ route('lista_jornais') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                    Ver jornais
                </a>
                <a href="{{ route('lista_noticia') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                    Ver notícias
                </a>
                <a href="{{ route('lista_conteudo') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                    Ver conteúdos
                </a>
                <a href="{{ route('lista_editarimagem') }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                    Editar Imagem
                </a>
            </div>
        </div>
    </div>
</body>

</html>