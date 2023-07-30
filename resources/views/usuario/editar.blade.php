@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <h2>Editar Usuario</h2>

            <form action="{{ route('usuario.atualizar', $usuario->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group m-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>

                <div class="row m-2">

                    <div class="col-sm">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome"
                            placeholder="Digite o seu nome" value="{{ $usuario->nome ? $usuario->nome : old('nome') }}">
                        @error('nome')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento"
                            value="{{ $usuario->data_nascimento ? $usuario->data_nascimento : old('data_nascimento') }}">
                        @error('data_nascimento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="genero" class="form-label">Gênero:</label>
                        <select name="genero" id="genero" class="form-select">
                            <option value="">Selecione o seu gênero</option>
                            <option value="masculino" {{ $usuario->genero == 'Masculino' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="feminino" {{ $usuario->genero == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                            <option value="outro" {{ $usuario->genero == 'Outro' ? 'selected' : '' }}>Outro</option>
                        </select>
                        @error('genero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-sm">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha"
                            placeholder="Confirme a sua senha" value="{{ old('senha') }}">
                        @error('senha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm">
                        <label for="confirmar_senha" class="form-label">Confirmar Senha:</label>
                        <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha"
                            placeholder="Confirme a sua senha" value="{{ old('confirmar_senha') }}">
                        @error('confirmar_senha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-success m-2">Editar</button>
                <a href="{{ route('usuario.index') }}" class="btn btn-primary m-2">Voltar</a>
            </form>
        </div>
    </div>
@endsection


<style>
    .text-danger {
        font-size: 12px;
    }

</style>