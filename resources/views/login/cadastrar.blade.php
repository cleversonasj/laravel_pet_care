<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PET Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container my-4">
        <div class="login_image">
            <img src="/img/sistema/image_register.jpg" alt="PET Login">
        </div>
        <div class="form_content">
            <h1>Cadastrar</h1>
            <form action="{{ route('login.adicionar') }}" method="POST">
                @csrf
                <div class="row-sm my-2">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome"
                        placeholder="Digite o seu nome" value="{{ old('nome')}}">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row-sm my-2">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Digite o seu e-mail" value="{{ old('email')}}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row-sm my-2">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="senha" id="senha"
                        placeholder="Digite a sua senha" value="{{ old('senha')}}">
                    @error('senha')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row-sm my-2">
                    <label for="confirmar_senha" class="form-label">Confirmar Senha:</label>
                    <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha"
                        placeholder="Confirme a sua senha" value="{{ old('confirmar_senha')}}">
                    @error('confirmar_senha')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row-sm my-2">
                    <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento')}}">
                    @error('data_nascimento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row-sm my-2">
                    <label for="genero" class="form-label">Genero:</label>
                    <select name="genero" id="genero" class="form-select">
                        <option value="">Selecione o seu gênero</option>
                        <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="feminino" {{ old('genero') == 'feminino' ? 'selected' : '' }}>Feminino</option>
                        <option value="outro" {{ old('genero') == 'outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('genero')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
            <p class="my-3">Você já é cadastrado? Realize o <a href="{{ route('login.index') }}">login</a>!</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>

<style>
    .container {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
    }

    .login_image,
    .form_content {
        width: 50%;
    }


    .form_content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        background-color: #f5f5f5;
    }



    img {
        width: 100%;
    }

    h1 {
        font-size: 40px;
        margin-bottom: 20px;
    }

    label {
        font-size: 14px;
    }

    p {
        font-size: 14px;
    }

    .text-danger{
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .login_image,
        .form_content {
            width: 100%;
        }

        form{
            width: 100%;
        }
    }
</style>
