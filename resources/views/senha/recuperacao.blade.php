<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PET Care</title>
</head>
<body>
    <h2>Redefinição de Senha</h2>
    <p>{{ $user->nome }}, tudo bem?</p>
    <p>Você solicitou a redefinição de senha. Clique no link abaixo para redefinir sua senha:</p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">Redefinir Senha</a>
</body>
</html>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    h2 {
        color: #0d6efd;
    }

    a {
        color: #0d6efd;
    }

    a:hover {
        color: #0d6efd;
        text-decoration: none;
    }
</style>