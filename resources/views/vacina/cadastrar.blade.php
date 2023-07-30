@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <h2>Cadastro de Vacina</h2>

            <form action="{{ route('vacinas.adicionar') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-sm">
                    <p>Informe os dados da vacina que será vinculada ao animal: <strong>{{ $animal->nome }}</strong>.</p>
                    <input type="hidden" class="form-control" id="animal_id" name="animal_id" value="{{ $animal->id }}">
                </div>

                <div class="row m-2">

                    <div class="col-sm">
                        <label for="nome" class="form-label">Nome da Vacina:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ old('nome') }}">
                        @error('nome')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="data_aplicacao" class="form-label">Data da Aplicação:</label>
                        <input type="date" class="form-control" id="data_aplicacao" name="data_aplicacao"
                            value="{{ old('data_aplicacao') }}">
                        @error('data_aplicacao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="proxima_aplicacao" class="form-label">Data da Próxima Vacina:</label>
                        <input type="date" class="form-control" id="proxima_aplicacao" name="proxima_aplicacao"
                            value="{{ old('proxima_aplicacao') }}">
                        @error('proxima_aplicacao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="preco" class="form-label">Preço:</label>
                        <input type="number" step="any" class="form-control" id="preco" name="preco"
                            value="{{ old('preco') }}">
                        @error('preco')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" length="250">{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary m-2">Cadastrar</button>
                <a href="{{ route('vacinas.listar', $animal->id) }}" class="btn btn-secondary m-2">Voltar</a>

            </form>
        </div>
    </div>
@endsection

<style>
    .text-danger {
        font-size: 12px;
    }

</style>
