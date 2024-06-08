@extends('layouts.main')
@section('title', 'Cadastrar Atendimento')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-calendar fa-2x"></i>
                <h3 class="smaller-font">Cadastro de Atendimento</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('atendimentos.store') }}">
            @csrf

            <div class="row">
                <div class="col">
                    <label for="data_atendimento" class="form-label"> <br>Data*:</label>
                    <input type="date" name="data_atendimento" id="data_atendimento"
                        class="form-control @error('nome') is-invalid @enderror" placeholder="Data">

                    @error('data_atendimento')
                        <div class="text-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <label for="hora_inicio" class="form-label"> <br>Hora de Início*:</label>
                    <input type="time" name="hora_inicio" id="hora_inicio"
                        class="form-control @error('hora_inicio') is-invalid @enderror" placeholder="Hora de Início"
                        required>

                    @error('hora_inicio')
                        <div class="text-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <label for="hora_fim" class="form-label"> <br>Hora de Início*:</label>
                    <input type="time" name="hora_fim" id="hora_fim"
                        class="form-control @error('hora_fim') is-invalid @enderror" placeholder="Hora de Termino" required>

                    @error('hora_fim')
                        <div class="text-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="medico_id" class="form-label"> <br>Médico*:</label>
                    <select class="form-select" name="medico_id" id="medico_id"></select>
                </div>

                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="paciente_id" class="form-label"> <br>Paciente*:</label>
                    <select class="form-select" name="paciente_id" id="paciente_id"></select>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="{{ route('atendimentos.index') }} " class="btn btn-light">Cancelar</a>
            </div>

        </form>
    </div>

    <script type="text/javascript">
        $('#medico_id').select2({
            placeholder: 'Selecione o médico',
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
                url: '{{ route('atendimentos.buscaMedico') }}',
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

        $('#paciente_id').select2({
            placeholder: 'Selecione o paciente',
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
                url: '{{ route('atendimentos.buscaPaciente') }}',
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
