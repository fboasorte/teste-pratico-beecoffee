@extends('layouts.main')
@section('title', 'Pacientes')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-user fa-2x"></i>
                <h3 class="smaller-font">Pacientes</h3>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white div-form">
                    <a href="{{ route('pacientes.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">CPF</th>
                                <th class="text-center">Data de Nascimento</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $paciente->id }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $paciente->nome }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $paciente->cpf }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $paciente->email }}
                                    </td>
                                    <td class="text-center nowrap-td">

                                        <form method="POST" action="{{ route('pacientes.destroy', $paciente->id) }}">
                                            @csrf
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('pacientes.show', $paciente->id) }}"><i
                                                    class="fas fa-eye"></i></a>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="{{ route('pacientes.edit', $paciente->id) }}"
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
