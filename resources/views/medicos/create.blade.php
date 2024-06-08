@extends('layouts.main')
@section('title', 'Cadastrar Médico')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-user-doctor fa-2x"></i>
                <h3 class="smaller-font">Cadastro de Médico</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('medicos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label"> <br>Nome*:</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror"
                    maxlength="255" placeholder="Nome" required>

                @error('nome')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="crm" class="form-label"> <br>CRM*:</label>
                <input type="text" name="crm" id="crm" class="form-control @error('crm') is-invalid @enderror"
                    maxlength="255" placeholder="crm" required>

                @error('crm')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="especialidades" class="form-label">Especialidades:</label>
                <select class="form-select" name="especialidades[]" id="especialidades" multiple></select>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="{{ route('medicos.index') }} " class="btn btn-light">Cancelar</a>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $('#especialidades').select2({
            placeholder: 'Selecione as especialidades',
            language: {
                noResults: function() {
                    return "Resultados não encontrados";
                },
                inputTooShort: function() {
                    return "Digite 1 ou mais caracteres";
                }
            },
            minimumInputLength: 1,
            ajax: {
                url: '{{ route('medicos.buscaEspecialidades') }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nome,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>


@endsection
