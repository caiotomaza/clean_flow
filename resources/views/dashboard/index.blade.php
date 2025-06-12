@extends('layouts.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- É recomendado integrar o Tailwind CSS ao seu processo de build (ex: Vite, Mix) para otimizar e purgar classes não utilizadas.
         Mas para fins de demonstração, o CDN funciona. --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Adicionando um fallback de fonte mais agradável e melhorias na renderização */
        body {
            font-family: 'Inter', sans-serif; /* Inter é uma fonte moderna e legível, adicione-a se possível ou use o fallback sans-serif do Tailwind */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
@endsection

@section('content')
<main class="p-6 sm:p-8 lg:p-10 bg-slate-100 min-h-screen">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

        {{-- Entradas --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 rounded-full bg-green-100">
                    <img src="https://cdn-icons-png.flaticon.com/512/4286/4286243.png" class="w-8 h-8" alt="Entradas">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Entradas</h1>
            </div>
            <div class="text-center mb-6">
                <h2 class="text-4xl font-extrabold text-green-600">{{ $dadosche['total'] }}</h2>
                <p class="text-sm text-slate-500 uppercase tracking-wider mt-1">Total de Entradas</p>
            </div>
            <div class="flex justify-around text-center border-t border-slate-200 pt-4">
                @foreach ([8, 12, 24] as $h)
                    <div>
                        <h3 class="text-lg font-semibold text-slate-700">{{ $dadosche["$h"] }}</h3>
                        <p class="text-xs text-slate-500 uppercase">{{ $h }}h</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Armazenados --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 rounded-full bg-blue-100">
                    <img src="https://cdn-icons-png.flaticon.com/512/3936/3936996.png" class="w-8 h-8" alt="Armazenados">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Armazenados</h1>
            </div>
            <div class="text-center mb-6">
                <h2 class="text-4xl font-extrabold text-blue-600">{{ $dadosArm['total'] }}</h2>
                <p class="text-sm text-slate-500 uppercase tracking-wider mt-1">Total Armazenados</p>
            </div>
            <div class="flex justify-around text-center border-t border-slate-200 pt-4">
                @foreach ([8, 12, 24] as $h)
                    <div>
                        <h3 class="text-lg font-semibold text-slate-700">{{ $dadosArm["$h"] }}</h3>
                        <p class="text-xs text-slate-500 uppercase">{{ $h }}h</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Saídas --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 rounded-full bg-red-100">
                    {{-- Ícone repetido de "Entradas", idealmente usar um ícone específico para Saídas --}}
                    <img src="https://cdn-icons-png.flaticon.com/512/4286/4286243.png" class="w-8 h-8" alt="Saídas">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Saídas</h1>
            </div>
            <div class="text-center mb-6">
                <h2 class="text-4xl font-extrabold text-red-600">{{ $dadosSai['total'] }}</h2>
                <p class="text-sm text-slate-500 uppercase tracking-wider mt-1">Total de Saídas</p>
            </div>
            <div class="flex justify-around text-center border-t border-slate-200 pt-4">
                @foreach ([8, 12, 24] as $h)
                    <div>
                        <h3 class="text-lg font-semibold text-slate-700">{{ $dadosSai["$h"] }}</h3>
                        <p class="text-xs text-slate-500 uppercase">{{ $h }}h</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Relatórios Semanais --}}
        {{-- <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 rounded-full bg-indigo-100">
                    <img src="https://cdn-icons-png.flaticon.com/512/3936/3936996.png" class="w-8 h-8" alt="Relatórios">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Relatórios da Semana</h1>
            </div>
            <div class="text-center mb-6">
                <h2 class="text-4xl font-extrabold text-indigo-600">30</h2>
                <p class="text-sm text-slate-500 uppercase tracking-wider mt-1">Recebidos</p>
            </div>
            <div class="grid grid-cols-5 gap-2 text-center border-t border-slate-200 pt-4">
                @foreach (['Seg'=>6, 'Ter'=>4, 'Qua'=>10, 'Qui'=>5, 'Sex'=>11] as $dia => $qtd)
                    <div>
                        <h3 class="text-md font-bold text-slate-700">{{ $qtd }}</h3>
                        <p class="text-xs text-slate-500 uppercase">{{ $dia }}</p>
                    </div>
                @endforeach
            </div>
        </div> --}}

        {{-- Peso Entradas/Saídas --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 rounded-full bg-sky-100"> {{-- Usando sky como cor neutra para peso --}}
                     {{-- Ícone repetido de "Entradas" --}}
                    <img src="https://cdn-icons-png.flaticon.com/512/4286/4286243.png" class="w-8 h-8" alt="Peso">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Peso Entradas</h1>
            </div>
            <div class="text-center mb-6">
                <h2 class="text-4xl font-extrabold text-sky-600">{{ number_format($pesosEntrada['total'], 0) }} KG</h2>
                <p class="text-sm text-slate-500 uppercase tracking-wider mt-1">Total hoje</p>
            </div>
            <div class="flex justify-around text-center border-t border-slate-200 pt-4">
                <div><h3 class="text-lg font-semibold text-slate-700">{{ number_format($pesosEntrada['8'], 0) }}KG</h3><p class="text-xs text-slate-500 uppercase">8h</p></div>
                <div><h3 class="text-lg font-semibold text-slate-700">{{ number_format($pesosEntrada['12'], 0) }}KG</h3><p class="text-xs text-slate-500 uppercase">12h</p></div>
                <div><h3 class="text-lg font-semibold text-slate-700">{{ number_format($pesosEntrada['24'], 0) }}KG</h3><p class="text-xs text-slate-500 uppercase">24h</p></div>
            </div>
        </div>

        {{-- Veículos Ativos --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                <div class="p-3 rounded-full bg-orange-100">
                    {{-- Este ícone tem um estilo diferente dos demais (linha vs preenchido). Para consistência visual, idealmente todos teriam o mesmo estilo. --}}
                    <img src="https://images.vexels.com/media/users/3/156199/isolated/preview/5d919088b660e6504436b01efe20d9a6-icone-de-caminhao-estilo-linha.png" class="w-8 h-8" alt="Veículos">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Veículos Ativos</h1>
            </div>
            <div class="text-center mb-6">
                <h2 class="text-4xl font-extrabold text-orange-600">{{ $veiculosAtivos }}</h2>
                <p class="text-sm text-slate-500 uppercase tracking-wider mt-1">Veiculos Cadastrados</p>
            </div>
            <div class="grid grid-cols-5 gap-2 text-center border-t border-slate-200 pt-4">
                {{-- @foreach (['Seg'=>9, 'Ter'=>4, 'Qua'=>10, 'Qui'=>5, 'Sex'=>11] as $dia => $qtd)
                    <div>
                        <h3 class="text-md font-bold text-slate-700">{{ $qtd }}</h3>
                        <p class="text-xs text-slate-500 uppercase">{{ $dia }}</p>
                    </div>
                @endforeach --}}
            </div>
        </div>

        {{-- Gráfico de Categorias --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-4 mb-6">
                 <div class="p-3 rounded-full bg-purple-100">
                    <img src="https://cdn-icons-png.flaticon.com/512/4227/4227865.png" class="w-8 h-8" alt="Categorias">
                </div>
                <h1 class="text-xl font-semibold text-slate-700">Resíduos Mais Registrados</h1>
            </div>
            <div class="flex flex-col md:flex-row md:space-x-8 items-center">
                <div class="max-w-xs mx-auto mb-6 md:mb-0 md:mx-0 flex-shrink-0">
                    <canvas id="graficoRosca"></canvas> {{-- Removido max-w-xs para permitir que o container controle --}}
                </div>
                <ul class="text-sm space-y-3 text-slate-600 flex-grow">
                    @foreach ($dadosGrafico as $index => $dado)
                        @php
                            $colors = ['blue-500', 'green-500', 'yellow-500', 'purple-500', 'red-500', 'gray-500', 'pink-500'];
                            $cor = $colors[$index % count($colors)];
                        @endphp
                        <li>
                            <span class="inline-block w-3 h-3 bg-{{ $cor }} rounded-full mr-2 align-middle"></span>
                            {{ round(($dado->total / $dadosGrafico->sum('total')) * 100) }}% {{ $dado->categoria }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- <div class="text-center mt-10">
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
            Ver Mais
        </button>
    </div> --}}
</main>
<script>
    const categorias = @json($dadosGrafico->pluck('categoria'));
    const totais = @json($dadosGrafico->pluck('total'));

    const ctx = document.getElementById('graficoRosca').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categorias,
            datasets: [{
                data: totais,
                backgroundColor: [
                    '#3B82F6',
                    '#22C55E',
                    '#F59E0B',
                    '#A855F7',
                    '#EF4444',
                    '#6B7280',
                    '#EC4899'
                ],
                borderColor: '#FFFFFF',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#FFF',
                    titleColor: '#334155',
                    bodyColor: '#334155',
                    borderColor: '#E2E8F0',
                    borderWidth: 1,
                    padding: 10,
                    cornerRadius: 6,
                    displayColors: true,
                    boxPadding: 3
                }
            }
        }
    });
</script>

@endsection