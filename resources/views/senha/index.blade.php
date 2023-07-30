<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PET Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <div class="reset_form">
        <h2>Reset de Senha</h2>
        <p>Informe o e-mail cadastrado para receber um link de recuperação de senha.</p>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('password.sendEmail') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="" class="form-control"
                    placeholder="Digite seu e-mail">
            </div>
            <div class="text-center m-3">
                <button type="submit" class="btn btn-success">Enviar</button>
                <a href="{{ route('login.index') }}" class="btn btn-danger">Voltar</a>
            </div>
        </form>
    </div>

</body>

</html>


<style>
    .reset_form{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        padding: 40px;
        background: #f5f5f5;
        box-sizing: border-box;
        border-radius: 10px;
    }

    p{
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .alert-danger, .alert-success{
        width: auto;
        padding: 5px;
        text-align: center;
        font-size: 14px;
    }

    @media (max-width: 576px) {
        .reset_form{
            width: 300px;
        }
    }
    

</style>