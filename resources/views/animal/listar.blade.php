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
            @if (count($animais) === 0)
                <div class="alert alert-warning">
                    Nenhum animal cadastrado.
                </div>
            @else
                <h2>Informações</h2>
                @if (count($animais) === 1)
                    <p>Clique no nome do animal cadastrado para ver as informações.</p>
                @else
                    <p>Você possui <strong>{{ count($animais) }}</strong> cadastrados. Escolha um para ver as informações.
                    </p>
                @endif
                <ul class="list-group">
                    @foreach ($animais as $animal)
                        <li class="list-group-item">
                            @if ($animal->foto)
                            <a href="{{ route('animal.informacoes', $animal->id) }}"><img src="/img/animais/{{ $animal->foto }}" alt="{{ $animal->nome }}" width="50px" height="50px">{{ $animal->nome }}</a>
                            @else
                            <a href="{{ route('animal.informacoes', $animal->id) }}"><img src="/img/sistema/sem_imagem.jpg" alt="Sem imagem" width="50px" height="50px">{{ $animal->nome }}</a>
                            @endif
                        
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>


@endsection

<style>
    li a {
        text-decoration: none;
        color: #000;
    }

    img {
        border-radius: 50%;
        margin-right: 10px;
    }
</style>
