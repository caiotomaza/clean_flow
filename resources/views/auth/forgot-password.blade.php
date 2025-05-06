<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Esqueci minha senha</title>
    <link rel="stylesheet" href="{{ asset('css\esqueci-senha\style.css') }}">
</head>
<body>
    <div class="modal ativo"> <!-- Usamos "modal ativo" como classe só pelo CSS -->
        <div class="modal-content">
            <h2>Esqueceu sua senha</h2>
            <p>Digite seu e-mail e enviaremos o link de redefinição</p>

            <!-- Status da sessão -->
            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="text">
                    <label class="email" for="email">E-mail</label>
                </div>
                <div class="campo">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="seuemail@exemplo.com" required autofocus>
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center justify-end mt-4" >
                    <x-primary-button id="botao">
                        {{ __('Enviar email') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
