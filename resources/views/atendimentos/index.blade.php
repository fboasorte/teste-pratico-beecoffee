@extends('layouts.main')
@section('title', 'Atendimentos')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-calendar fa-2x"></i>
                <h3 class="smaller-font">Atendimentos</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <form action="" method="get">
                    <label for="medico_id" class="form-label"> <br>Médico*:</label>
                    <select class="form-select" name="medico_id" id="medico_id"></select>
                    <button type="submit" class="btn btn-success btn-sm mt-2">Buscar</button>
                    <a href="{{ route('atendimentos.index') }}"
                        class="btn btn-primary btn-sm mt-2">Limpar</a>
                </form>
            </div>
        </div>
        <br>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white div-form">
                    <a href="{{ route('atendimentos.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Horário Início</th>
                                <th class="text-center">Horário Fim</th>
                                <th class="text-center">Médico</th>
                                <th class="text-center">Paciente</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atendimentos as $atendimento)
                                <tr>
                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $atendimento->id }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ date('d/m/Y', strtotime($atendimento->data_atendimento)) }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ date('H:i', strtotime($atendimento->hora_inicio))  }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ date('H:i', strtotime($atendimento->hora_fim))  }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $atendimento->medico->nome }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $atendimento->paciente->nome }}
                                    </td>

                                    <td class="text-center nowrap-td">

                                        <form method="POST" action="{{ route('atendimentos.destroy', $atendimento->id) }}">
                                            @csrf
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('atendimentos.show', $atendimento->id) }}"><i
                                                    class="fas fa-eye"></i></a>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="{{ route('atendimentos.edit', $atendimento->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm" title='Excluir'
                                                onclick="return confirm('Deseja realmente excluir esse registro?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

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
    </script>

@endsection
