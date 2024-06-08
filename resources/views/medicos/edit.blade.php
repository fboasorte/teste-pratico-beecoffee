@extends('layouts.main')
@section('title', 'Editar Médico')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-user-doctor fa-2x"></i>
                <h3 class="smaller-font">Edição de Médico</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('medicos.update', $medico->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label"> <br>Nome*:</label>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror"
                    value="{{ $medico->nome }}" placeholder="Nome" required>

                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="crm" class="form-label"> <br>CRM*:</label>
                <input type="text" name="crm" id="crm" class="form-control @error('crm') is-invalid @enderror"
                    value="{{ $medico->crm }}" placeholder="crm" required>

                @error('crm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="especialidades" class="form-label">Especialidades:</label>
                <select class="form-select" name="especialidades[]" id="especialidades" multiple>

                    @foreach ($especialidades as $especialidade)
                        <option value="{{ $especialidade->id }}" selected> {{ $especialidade->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="{{ route('medicos.index') }} " class="btn btn-light">Cancelar</a>
            </div>
        </form>
    </div>
    </form>

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
