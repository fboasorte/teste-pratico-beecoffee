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
                                <h6 class="mb-0">Data:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ date('d/m/Y', strtotime($atendimento->data_atendimento)) }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Hora de Início:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ date('H:i', strtotime($atendimento->hora_inicio)) }}
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Hora de Término:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ date('H:i', strtotime($atendimento->hora_fim)) }}
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Médico:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $atendimento->medico->nome }}
                            </div>
                        </div>


                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Paciente:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $atendimento->paciente->nome }}
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
