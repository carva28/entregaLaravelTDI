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
            background: rgb(148, 187, 233);
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
            background: rgb(238, 174, 202);
            border: 1px solid transparent;
            border-radius: 50px;
            width: 50%;
            padding: 25px;
        }

        .title {
            font-size: 50px;
            color: white;
        }

        .links>a {
            color: #fff;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            transition: 0.5s;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .links a:hover {
            color: black;
        }

        .h2404 {
            color: #e62b7d;
            font-size: 50px;
        }

        .h4404 {
            color: #3a6598;
            font-size: 20px;
        }

        .img401 {
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h2 class="h2404">401 Error </h2>
            <h4 class="h4404">Hey onde vais? </h4>
            <h4 class="h4404">Não tens acesso</h4>
            <img class="img401" src="images/errors/police-officer-3-512.png"/>
            <div class="links">
                <a href="/{{ $exception->getMessage() }}" class="btncandelarseccao btn btn-xs btn-info pull-right">
                    Voltar atrás
                </a>
            </div>
        </div>
    </div>
</body>

</html>