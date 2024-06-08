@extends('layouts.main')
@section('title', 'Médico')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-calendar fa-2x"></i>
                <h3 class="smaller-font">Médico</h3>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nome:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $medico->nome }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">CRM:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $medico->crm }}
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Especialidades:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">

                                @if (count($medico->especialidades) > 0)
                                    <ul>
                                        @foreach ($medico->especialidades as $especialidade)
                                            <li>{{ $especialidade->nome }}</li>
                                        @endforeach
                                    </ul>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-light">Voltar</a>
    </div>

@stop
