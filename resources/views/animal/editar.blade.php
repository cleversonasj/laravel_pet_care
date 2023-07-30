@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <h2>Editar Animal</h2>

            <form action="{{ route('animal.atualizar', $animal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group m-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row m-2">

                    <div class="col-sm">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ $animal->nome }}">
                            @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $animal->data_nascimento }}">
                        @error('data_nascimento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="especie" class="form-label">Espécie:</label>
                        <select class="form-select" aria-label="Default select example" id="especie" name="especie">
                            <option selected>Selecione</option>
                            <option value="Cao" {{ $animal->especie === 'Cão' ? 'selected' : '' }}>Cão</option>
                            <option value="Gato" {{ $animal->especie === 'Gato' ? 'selected' : '' }}>Gato</option>
                        </select>
                        @error('especie')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-sm">
                        <label for="raca" class="form-label">Raça:</label>
                        <select class="form-select" aria-label="Default select example" id="raca" name="raca">
                            <option selected>Selecione</option>
                            @foreach ($racas as $raca)
                                <option value="{{ $raca->nome }}" {{ $animal->raca === $raca->nome ? 'selected' : '' }}>
                                    {{ $raca->nome }} </option>
                            @endforeach
                        </select>
                        @error('raca')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select class="form-select" aria-label="Default select example" id="sexo" name="sexo">
                            <option selected>Selecione</option>
                            <option value="Macho" {{ $animal->sexo === 'Macho' ? 'selected' : '' }}>Macho</option>
                            <option value="Femea" {{ $animal->sexo === 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
                        </select>
                        @error('sexo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="peso" class="form-label">Peso (Kgs):</label>
                        <input type="number" step="any" class="form-control" id="peso" name="peso" value="{{ $animal->peso }}">
                        @error('peso')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm">
                        <label for="porte" class="form-label">Porte:</label>
                        <select class="form-select" aria-label="Default select example" id="porte" name="porte">
                            <option selected>Selecione</option>
                            <option value="Pequeno" {{ $animal->porte === 'Pequeno' ? 'selected' : '' }}>Pequeno</option>
                            <option value="Medio" {{ $animal->porte === 'Medio' ? 'selected' : '' }}>Médio</option>
                            <option value="Grande" {{ $animal->porte === 'Grande' ? 'selected' : '' }}>Grande</option>
                        </select>
                        @error('porte')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                </div>


                <div class="row m-2">
                    <label for="observacao" class="form-label">Observação:</label>
                    <textarea class="form-control" id="descricao" name="observacao" rows="3">{{ $animal->observacao }}</textarea>
                    @error('peso')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success m-2">Editar</button>
                <a href="{{ route('animal.informacoes', $animal->id) }}" class="btn btn-primary m-2">Voltar</a>
            </form>
        </div>
    </div>
@endsection

<style>
    .text-danger {
        font-size: 12px;
    }

</style>