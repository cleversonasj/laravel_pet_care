@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="buttons">
                <a href="{{ route('vacinas.cadastrar', $animal->id) }}" class="btn btn-primary my-2">Cadastrar Vacina</a>
            </div>
            @if (count($vacinas) === 0)
                <div class="alert alert-warning">
                    O animal <strong>{{ $animal->nome }}</strong> não possui nenhuma vacina cadastrada.
                </div>
            @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Vacina</th>
                            <th scope="col">Data da Aplicação</th>
                            <th scope="col">Data da Próxima Aplicação</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacinas as $vacina)
                            <tr>
                                <td>{{ $vacina->nome }}</td>
                                <td>{{ date('d/m/Y', strtotime($vacina->data_aplicacao)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($vacina->proxima_aplicacao)) }}</td>
                                <td>{{ $vacina->descricao }}</td>
                                <td>R$ {{ number_format($vacina->preco, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('vacinas.editar', $vacina->id) }}" class="btn btn-primary m-2"><i
                                            class="material-icons">edit</i></a>
                                    <a href=" {{ route('vacina.excluir', $vacina->id) }}" class="btn btn-danger"><i
                                            class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="text-center mt-4">
                <a class="btn btn-success" href="{{ route('animal.informacoes', $animal->id) }}">Voltar</a>
            </div>



        </div>
    </div>


@endsection


<style>
    table{
        text-align: center;
        font-size: 14px;
    }

    th,td{
        min-width: 150px;
        vertical-align: middle;
    }
</style>