@extends('layouts.main')
@section('title', 'Paciente')
@section('content')

<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-user fa-2x"></i>
            <h3 class="smaller-font">Paciente</h3>
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
                            {{$paciente->nome}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">CPF:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$paciente->cpf}}
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$paciente->email}}
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Data de Nascimento:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}
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