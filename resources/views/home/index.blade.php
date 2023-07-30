@extends('layout.main')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="my-4">{{ $user->nome }}, seja bem-vindo(a) ao PET Care.</h1>
            <p>Aqui, você pode cuidar melhor do seu animal de estimação, mantendo um registro detalhado de suas
                informações importantes. Você pode cadastrar seu PET, acompanhar as vacinas aplicadas e gerenciar os
                vermífugos.</p>
            <p><span class="highlight">Cadastre seu PET:</span> Registre todas as informações relevantes sobre seu PET, como
                nome, idade, raça, sexo e outras características importantes. Isso ajudará a manter um perfil completo do
                seu
                companheiro fiel.</p>
            <p><span class="highlight">Acompanhe as Vacinas:</span> Mantenha um histórico das vacinas do seu PET. Você poderá
                adicionar as datas de vacinação, o tipo de vacina administrada e até mesmo fazer anotações importantes
                relacionadas à vacinação.</p>
            <p><span class="highlight">Gerencie os Vermífugos:</span> Não se esqueça da importância de manter seu PET livre
                de
                vermes. No PET Care, você pode registrar quando foi administrado o vermífugo, qual tipo foi utilizado e
                quaisquer outros detalhes relevantes.</p>
            <p>Com o PET Care, você terá tudo organizado em um só lugar, facilitando o monitoramento e o cuidado com seu
                animal
                de estimação. Garanta a saúde e o bem-estar do seu PET com nosso sistema intuitivo e fácil de usar.</p>
            <p>Comece agora mesmo e proporcione ao seu PET a atenção e o cuidado que ele merece!</p>
        </div>
    </div>
@endsection

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        text-align: justify;
    }

    h1 {
        color: #2f1d1c;
        font-size: 25px;
    }

    p {
        font-size: 16px;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .highlight {
        color: #361b1a;
        font-weight: bold;
    }
</style>
