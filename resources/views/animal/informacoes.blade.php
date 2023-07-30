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
            <div id="card">
                <div class="buttons">
                    <a href="{{ route('animal.editar', $animal->id) }}" class="btn btn-primary m-2"><i
                            class="material-icons">edit</i></a>
                    <a href="{{ route('animal.excluir', $animal->id) }}" class="btn btn-danger m-2"><i
                            class="material-icons">delete</i></a>
                    <a href="{{ route('vacinas.listar', $animal->id) }}" class="btn btn-secondary m-2"><i
                            class="material-icons">local_hospital</i></a>
                    <a href=" {{ route('vermifugos.listar', $animal->id) }}" class="btn btn-secondary m-2"><i
                            class="material-icons">bug_report</i></a>
                </div>
                <div class="info p-4">
                    <p><strong>Tutor:</strong>{{ $tutor->nome }} &#40<a href="{{ route('usuario.index') }}">Acessar</a>&#41</p>
                    <p><strong>Nome:</strong>{{ $animal->nome }}</p>
                    <p><strong>Data de Nascimento:</strong>{{ date('d/m/Y', strtotime($animal->data_nascimento)) }}</p>
                    <p><strong>Peso:</strong>{{ $animal->peso }} Kgs</p>
                    <p><strong>Espécie:</strong>{{ $animal->especie }}</p>
                    <p><strong>Raça:</strong>{{ $animal->raca }}</p>
                    <p><strong>Sexo:</strong>{{ $animal->sexo }}</p>
                    <p><strong>Porte:</strong>{{ $animal->porte }}</p>
                    @if(count($vacinas) === 0)
                        <p><strong>Vacinas:</strong>Nenhuma vacina cadastrada.</p>
                    @elseif(count($vacinas) === 1)
                        <p><strong>Vacinas:</strong>{{ count($vacinas) }} vacina cadastrada.</p>
                    @else
                        <p><strong>Vacinas:</strong>{{ count($vacinas) }} vacinas cadastradas.</p>
                    @endif
                    @if(count($vermifugos) === 0)
                        <p><strong>Vermífugos:</strong>Nenhum vermífugo cadastrado.</p>
                    @elseif(count($vermifugos) === 1)
                        <p><strong>Vermífugos:</strong>{{ count($vermifugos) }} vermífugo cadastrado.</p>
                    @else
                        <p><strong>Vermífugos:</strong>{{ count($vermifugos) }} vermífugos cadastrados.</p>
                    @endif
                    <p><strong>Observação:</strong>{{ $animal->observacao }}</p>
                    <p><strong>Animal cadastrado em:</strong>{{ date('d/m/Y H:i:s', strtotime($animal->created_at)) }}</p>
                    <p><strong>Cadastro atualizado em:</strong>{{ date('d/m/Y H:i:s', strtotime($animal->updated_at)) }}</p>
                </div>
                <div class="image">
                    @if ($animal->foto)
                        <img src="/img/animais/{{ $animal->foto }}" alt="{{ $animal->nome }}">
                    @else
                        <img src="/img/sistema/sem_imagem.jpg" alt="Sem imagem">
                    @endif
                </div>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-success" href="{{ route('animal.listar') }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection



<style>
    #card {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #card .image {
        width: 200px;
        height: 200px;
        border-radius: 5px;
        overflow: hidden;
    }

    #card .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #card .info {
        width: 100%;
        max-width: 500px;
        margin-left: 20px;
        padding: 10px;
        border-left: 1px solid #ccc;
        text-align: left;
    }

    #card .info p {
        margin-bottom: 5px;
    }

    #card .info p strong {
        margin-right: 10px;
    }

    #card .info p:last-child {
        margin-bottom: 0;
    }

    p {
        font-size: 16px;
        line-height: 1.2;
    }

    .buttons {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }


    @media (max-width: 768px) {
        #card {
            flex-direction: column-reverse;
        }

        #card .image {
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
        }

        #card .info {
            width: 100%;
            max-width: 100%;
            margin-left: 0;
            border-left: none;
        }

        #card .buttons {
            flex-direction: row;
            width: 100%;
            max-width: 100%;
            justify-content: space-between;
        }

        #card .buttons a {
            margin: 0;
        }
    }

    

</style>
