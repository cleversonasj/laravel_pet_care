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
                <a href=" {{ route('vermifugos.cadastrar', $animal->id) }}" class="btn btn-primary my-2">Cadastrar
                    Vermífugo</a>
            </div>
            @if (count($vermifugos) === 0)
                <div class="alert alert-warning">
                    O animal <strong>{{ $animal->nome }}</strong> não possui nenhum vermífugo cadastrado.
                </div>
            @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Vermifugo</th>
                            <th scope="col">Data da Aplicação</th>
                            <th scope="col">Data da Próxima Aplicação</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vermifugos as $vermifugo)
                            <tr>
                                <td>{{ $vermifugo->nome }}</td>
                                <td>{{ date('d/m/Y', strtotime($vermifugo->data_aplicacao)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($vermifugo->proxima_aplicacao)) }}</td>
                                <td>{{ $vermifugo->descricao }}</td>
                                <td>R$ {{ number_format($vermifugo->preco, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('vermifugo.editar', $vermifugo->id) }}" class="btn btn-primary"><i
                                            class="material-icons">edit</i></a>
                                    <a href="{{ route('vermifugo.excluir', $vermifugo->id) }}" class="btn btn-danger"><i
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