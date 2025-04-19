<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
</head>
<body>
    <div class="caixa">
        <div class="login-area">
            <h2><strong>Bem-vindo</strong></h2>
            <p>Entre na sua conta para acessar o sistema</p>

            {{-- Mensagem de status, como confirmação de senha alterada --}}
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Formulário de login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="campo">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="usuario@email.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="campo">
                    <label for="password">Senha</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Digite sua senha"
                        required
                    >
                </div>

                {{-- Erro geral, como email ou senha incorretos --}}
                @if (session('error'))
                    <div class="erro-geral">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="campo-checkbox">
                    <label for="remember">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        > Lembrar-me
                    </label>
                </div>

                <button type="submit" class="botao">Entrar</button>
            </form>

            {{-- Link para recuperação de senha --}}
            @if (Route::has('password.request'))
                <a
                    id="esqueci-senha"
                    class="link-recuperar-senha"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Esqueceu a senha?') }}
                </a>
            @endif
        </div>

        <div class="imagem">
            <img src="{{ asset('assets/img/reciclagem.jpeg') }}" alt="Imagem decorativa">
        </div>
    </div>
</body>
</html>
