@extends('layouts.main')
@section('title', 'Editar Especialidade')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Edição de Especialidade</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('especialidades.update', $especialidade->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label"> <br>Nome*:</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror"
                    maxlength="255" value="{{ $especialidade->nome }}" placeholder="Nome" required>

                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('especialidades.index') }} " class="btn btn-light">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
