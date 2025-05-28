<div>
    <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
    ?>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <header class="bg-white shadow-md px-6 py-4 flex flex-col md:flex-row justify-between items-center">
        <!-- Menu de navegação -->
        <div class="flex items-center space-x-4 flex-wrap">
            <!-- Ícone -->
            <a href="{{ route('dashboard.index') }}">
                <button class="p-2">
                    <img src="{{ asset('assets/img/Icon_clean.png')}}" alt="Ícone" class="w-14 h-14">
                </button>
            </a>

            <!-- Itens do menu -->
            <a href="{{ route('dashboard.index') }}">
                <button class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md transition {{ request()->is('dashboard*') ? 'font-bold text-blue-700 underline' : '' }}">
                    Painel
                </button>
            </a>
            <a href="{{ route('registros.index') }}">
                <button class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md transition {{ request()->is('registros*') ? 'font-bold text-blue-700 underline' : '' }}">
                    Registros
                </button>
            </a>
            <a href="{{ route('relatorios.index') }}">
                <button class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md transition {{ request()->is('relatorios*') ? 'font-bold text-blue-700 underline' : '' }}">
                    Relatórios
                </button>
            </a>
            <a href="{{ route('cadastros.index') }}">
                <button class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md transition {{ request()->is('cadastros*') ? 'font-bold text-blue-700 underline' : '' }}">
                    Cadastros
                </button>
            </a>
            <a href="{{ route('usuarios.index') }}">
                <button class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md transition {{ request()->is('usuarios*') ? 'font-bold text-blue-700 underline' : '' }}">
                    Usuários
                </button>
            </a>
        </div>

        <!-- Pesquisa e ícones -->
        <div class="flex items-center mt-4 md:mt-0 space-x-4">
            <input type="text" placeholder="Buscando por algo?" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

            <button class="text-xl hover:text-blue-600 transition" id="settings-btn">⚙️</button>
            <button class="relative text-xl hover:text-blue-600 transition" id="notifications-btn">
                <img src="{{ asset('assets/img/bellNotification.svg')}}" alt="" class="w-8 h-8">
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 rounded-full">2</span>
            </button>

            <!-- Botão de logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition">
                    Sair
                </button>
            </form>
        </div>
    </header>
</div>
