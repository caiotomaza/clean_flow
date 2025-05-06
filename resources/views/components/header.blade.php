<div>
    <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
    ?>
    <head>
        <link rel="stylesheet" href="{{ asset('css/header/style.css') }}">
    </head>
    <header class="custom-header">
        <div class="custom-menu">
            <a href="{{  route('dashboard.index')}}">
                <button class="custom-icon-button">
                    <img src="https://stratus.eco.br/wp-content/uploads/2024/07/caminhao-de-lixo.png" alt="Ícone" width="50">
                </button>
            </a>
            <a href="{{ route('dashboard.index')}}">
                <button class="custom-menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">Painel</button>
            </a>
            <a href="{{ route('registros.index')}}">
                <button class="custom-menu-item {{ request()->is('registros*') ? 'active' : '' }}">Registros</button>
            </a>
            <a href="{{ route('cadastros.index')}}">
                <button class="custom-menu-item {{ request()->is('cadastros*') ? 'active' : '' }}">Cadastros</button>
            </a>
            <a href="{{ route('usuarios.index')}}">
                <button class="custom-menu-item {{ request()->is('usuarios*') ? 'active' : '' }}">Usuários</button>
            </a>
        </div>
        <div class="custom-search-container">
            <input type="text" placeholder="Buscando por algo?" class="custom-search-input">
            <div class="custom-icons">
                <button class="custom-icon-button" id="settings-btn">⚙️</button>
                <button class="custom-icon-button" id="notifications-btn">
                    🔔 <span class="custom-badge">2</span>
                </button>                
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="custom-logout-button">Sair</button>
            </form>
        </div>
    </header>
</div>
