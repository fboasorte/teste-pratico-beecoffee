@extends('layouts.main')
@section('title', 'Médicos')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-user-doctor fa-2x"></i>
                <h3 class="smaller-font">Médicos</h3>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white div-form">
                    <a href="{{ route('medicos.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">CRM</th>
                                <th class="text-center">Especialidades</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicos as $medico)
                                <tr>
                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $medico->id }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $medico->nome }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $medico->crm }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        @if (count($medico->especialidades) > 0)
                                        <ul>
                                            @foreach ($medico->especialidades as $especialidade)
                                                <li>{{ $especialidade->nome }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                            <p>Não possui</p>
                                        @endif
                                    </td>

                                    <td class="text-center nowrap-td">

                                        <form method="POST" action="{{ route('medicos.destroy', $medico->id) }}">
                                            @csrf
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('medicos.show', $medico->id) }}"><i
                                                    class="fas fa-eye"></i></a>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="{{ route('medicos.edit', $medico->id) }}"
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

@endsection
