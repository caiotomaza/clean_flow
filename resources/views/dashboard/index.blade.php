<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="botao">Sair</button>
    </form>
    
    <h1>Bem-vindo ao seu Dashboard!</h1>
    <p>Olá, {{ Auth::user()->name }}! Bem-vindo ao painel de controle.</p>
</body>
</html>