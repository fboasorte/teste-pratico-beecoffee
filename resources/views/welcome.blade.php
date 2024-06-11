<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teste Prático</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Teste Prático
                </div>

                <div class="links">
                    <a href="{{ route('pacientes.index') }}">Paciente</a>
                    <a href="{{ route('especialidades.index') }}">Especialidades</a>
                    <a href="{{ route('medicos.index') }}">Médicos</a>
                    <a href="{{ route('atendimentos.index') }}">Atendimentos</a>
                </div>
            </div>
        </div>
    </body>
</html>
