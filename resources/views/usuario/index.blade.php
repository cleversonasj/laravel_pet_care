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
                <div class="text-center">
                    <a href="{{ route('usuario.editar', $usuario->id) }}" class="btn btn-primary m-2"><i
                            class="material-icons">edit</i></a>
                </div>
                <div class="info py-4">
                    <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
                    <p><strong>E-mail:</strong> {{ $usuario->email }}</p>
                    <p><strong>Data de Nascimento:</strong> {{ date('d/m/Y', strtotime($usuario->data_nascimento)) }}</p>
                    <p><strong>Gênero:</strong> {{ $usuario->genero }}</p>
                    @if(count($animaisDoUsuario) === 0)
                        <p><strong>Animais:</strong> Nenhum animal cadastrado.</p>
                    @elseif(count($animaisDoUsuario) === 1)
                        <p><strong>Animais:</strong> {{ count($animaisDoUsuario) }} animal cadastrado. &#40<a href="{{ route('animal.listar') }}">Acessar</a>&#41</p>
                    @else
                        <p><strong>Animais:</strong> {{ count($animaisDoUsuario) }} animais cadastrados. &#40<a href="{{ route('animal.listar') }}">Acessar</a>&#41</p>
                    @endif
                    <p><strong>Usuário cadastrado em:</strong>{{ date('d/m/Y H:i:s', strtotime($usuario->created_at)) }}</p>
                    <p><strong>Cadastro atualizado em:</strong>{{ date('d/m/Y H:i:s', strtotime($usuario->updated_at)) }}</p>
                </div>
                <div class="image">
                    @if($usuario->foto)
                        <img src="/img/usuarios/{{ $usuario->foto }}" alt="Foto de {{ $usuario->nome }}">
                    @else
                        <img src="/img/sistema/sem_imagem.jpg" alt="Sem imagem">
                    @endif
                </div>
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
        margin-bottom: 10px;
    }

    #card .info p strong {
        margin-right: 10px;
    }

    #card .info p:last-child {
        margin-bottom: 0;
    }

    p {
        line-height: 1;
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

        .buttons{
        border-top: 1px solid #ccc;
        padding-top: 10px;
        }

    }

    

</style>
