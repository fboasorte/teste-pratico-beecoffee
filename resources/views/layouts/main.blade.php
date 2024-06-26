<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">



    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container2 {
            flex: 1;
        }

        footer {
            background-color: #1c2c4c;
            color: white;
            padding: 8px;
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
        }

        .left-align {
            text-align: left;
        }
    </style>


</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('pacientes.index') }}">Pacientes</a></li>
                <li><a href="{{ route('especialidades.index') }}">Especialidades</a></li>
                <li><a href="{{ route('medicos.index') }}">Médicos</a></li>
                <li><a href="{{ route('atendimentos.index') }}">Atendimentos</a></li> 
            </ul>
        </nav>
    </header>

    <div class="container2">
        @include('layouts.flash-message')

        @yield('content')
    </div>

</body>

</html>
