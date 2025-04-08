<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="{{ asset('css/cadastro/style.css') }}">
</head>
<body>
    <div class="caixa">
        <div class="login-area">
            <h2><strong>Cadastro</strong></h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="campo">
                    <label for="name">Nome</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="campo">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="campo">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="campo">
                    <label for="password_confirmation">Confirme a Senha</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="botao">Cadastrar</button>
                <a class="esqueci" href="{{ route('login') }}">Já tenho uma conta</a>
            </form>
        </div>

        <div class="imagem">
            <img src="{{ asset('assets/img/reciclagem.jpeg') }}" alt="Imagem de Reciclagem">
        </div>
    </div>
</body>
</html>
