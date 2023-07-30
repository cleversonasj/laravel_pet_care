@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <h2>Editar Vermífugo</h2>

            <form action="{{ route('vermifugo.atualizar', $vermifugo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-sm">
                    <p>Edite o Vermífugo vinculado ao animal <strong>{{ $animal->nome }}</strong>.</p>
                    <input type="hidden" class="form-control" id="animal_id" name="animal_id" value="{{ $animal->id }}">
                </div>

                <div class="row m-2">

                    <div class="col-sm">
                        <label for="nome" class="form-label">Nome do Vermífugo:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ $vermifugo->nome }}" >
                            @error('nome')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="data_aplicacao" class="form-label">Data da Aplicação:</label>
                        <input type="date" class="form-control" id="data_aplicacao" name="data_aplicacao"
                            value="{{ $vermifugo->data_aplicacao }}" >
                            @error('data_aplicacao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="proxima_aplicacao" class="form-label">Data da Próxima Vacina:</label>
                        <input type="date" class="form-control" id="proxima_aplicacao" name="proxima_aplicacao"
                            value="{{ $vermifugo->proxima_aplicacao }}" >
                            @error('proxima_aplicacao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="preco" class="form-label">Preço:</label>
                        <input type="number" step="any" class="form-control" id="preco" name="preco"
                            value="{{ $vermifugo->preco }}" >
                            @error('preco')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" length="250">{{ $vermifugo->descricao }}</textarea>
                    @error('descricao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary m-2">Editar</button>
                <a href="{{ route('vacinas.listar', $animal->id) }}" class="btn btn-success m-2">Voltar</a>

            </form>
        </div>
    </div>
@endsection

<style>
    .text-danger {
        font-size: 12px;
    }

</style>