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

    <div class="container">
        <div class="login_image">
            <img src="/img/sistema/login_image.jpg" alt="PET Login">
        </div>
        <div class="form_content">
            <h1>PET Care</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('login.login') }}" method="POST">
                @csrf
                <div class="row-sm my-2">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail"
                        class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="row-sm my-2">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha"
                        class="form-control" value="{{ old('senha') }}">
                        @error('senha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="row-sm">
                    <ul class="mt-4">
                        <li>Não é cadastrado? <a href="{{ route('login.cadastrar') }}">Cadastre-se!</a></li>
                        <li>Esqueceu sua senha? <a href="{{ route('password.index') }}">Recupere-a!</a></li>
                    </ul>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>


<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;
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
        background-color: #f5f5f5;
        border-radius: 10px;
    }


    img {
        width: 100%;
    }

    h1{
        font-size: 40px;
        margin-bottom: 20px;
    }

    label{
        font-size: 14px;
    }

    li{
        font-size: 14px;
        list-style: none;
    }

    .alert-danger, .alert-success{
        width: auto;
        padding: 5px;
        text-align: center;
        font-size: 14px;
    }

    .text-danger{
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        form{
            width: 100%;
        }

        .login_image,
        .form_content {
            width: 100%;
        }

    }
</style>
