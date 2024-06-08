@extends('layouts.main')
@section('title', 'Editar Paciente')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-user fa-2x"></i>
                <h3 class="smaller-font">Edição de Paciente</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('pacientes.update', $paciente->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label"> <br>Nome*:</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror"
                    value="{{ $paciente->nome }}" maxlength="255" placeholder="Nome" required>

                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label"> <br>CPF*:</label>
                <input type="text" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror"
                    value="{{ $paciente->cpf }}" maxlength="11" placeholder="CPF" required>

                @error('cpf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label"> <br>Data de Nascimento*:</label>
                <input type="date" name="data_nascimento" id="data_nascimento"
                    class="form-control @error('data_nascimento') is-invalid @enderror" placeholder="Data de Nascimento"
                    value="{{ $paciente->data_nascimento }}" required>

                @error('data_nascimento')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label"> <br>E-mail*:</label>
                <input type="email" name="email" id="email" value="{{ $paciente->email }}"
                    class="form-control @error('email') is-invalid @enderror" maxlength="255" placeholder="E-mail" required>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('pacientes.index') }} " class="btn btn-light">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
