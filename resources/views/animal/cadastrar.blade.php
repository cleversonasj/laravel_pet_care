@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <h2>Cadastro de Animal</h2>
            <p>Informe os dados do animal vinculado ao usuário <strong>{{ $user->nome }}</strong>.</p>
            <form action="{{ route('animal.adicionar') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">

                <div class="form-group m-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row m-2">

                    <div class="col-sm">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}">
                        @error('data_nascimento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="especie" class="form-label">Espécie:</label>
                        <select class="form-select" aria-label="Default select example" id="especie" name="especie">
                            <option value="" selected>Selecione</option>
                            <option value="Cão" {{ old('especie') === 'Cão' ? 'selected' : '' }}>Cão</option>
                            <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                        </select>
                        @error('especie')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                </div>

                <div class="row m-2">

                    <div class="col-sm teste">
                        <label for="raca" class="form-label">Raça:</label>
                        <select class="form-select" aria-label="Default select example" id="raca" name="raca">
                            <option value="" selected>Selecione</option>
                            @foreach ($racas as $raca)
                            <option value="{{ $raca->nome }}" {{ old('raca') === $raca->nome ? 'selected' : '' }}>{{ $raca->nome }}</option>
                            @endforeach
                        </select>
                        @error('raca')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>


                    <div class="col-sm">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select class="form-select" aria-label="Default select example" id="sexo" name="sexo">
                            <option value="" selected>Selecione</option>
                            <option value="Macho" {{ old('sexo') === 'Macho' ? 'selected' : '' }}>Macho</option>
                            <option value="Femea" {{ old('sexo') === 'Femea' ? 'selected' : '' }}>Fêmea</option>
                        </select>
                        @error('sexo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="peso" class="form-label">Peso (Kgs):</label>
                        <input type="number" step="any" class="form-control" id="peso" name="peso" value="{{ old('peso') }}">
                        @error('peso')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="porte" class="form-label">Porte:</label>
                        <select class="form-select" aria-label="Default select example" id="porte" name="porte">
                            <option value="" selected>Selecione</option>
                            <option value="Pequeno" {{ old('porte') === 'Pequeno' ? 'selected' : '' }}>Pequeno</option>
                            <option value="Medio" {{ old('porte') === 'Medio' ? 'selected' : '' }}>Médio</option>
                            <option value="Grande" {{ old('porte') === 'Grande' ? 'selected' : '' }}>Grande</option>
                        </select>
                        @error('porte')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <label for="observacao" class="form-label">Observação:</label>
                    <textarea class="form-control" id="descricao" name="observacao" rows="3">{{ old('observacao') }}</textarea>
                    @error('observacao')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary m-2">Cadastrar</button>

            </form>
        </div>
    </div>
@endsection

<style>
    .text-danger {
        font-size: 12px;
    }

</style>
