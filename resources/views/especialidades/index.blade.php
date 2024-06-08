@extends('layouts.main')
@section('title', 'Especialidades')
@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Especialidades</h3>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white div-form">
                    <a href="{{ route('especialidades.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($especialidades as $especialidade)
                                <tr>
                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $especialidade->id }}
                                    </td>

                                    <td class="text-left text-wrap" data-toggle="tooltip" data-placement="top">
                                        {{ $especialidade->nome }}
                                    </td>

                                    <td class="text-center nowrap-td">

                                        <form method="POST" action="{{ route('especialidades.destroy', $especialidade->id) }}">
                                            @csrf
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('especialidades.show', $especialidade->id) }}"><i
                                                    class="fas fa-eye"></i></a>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="{{ route('especialidades.edit', $especialidade->id) }}"
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
