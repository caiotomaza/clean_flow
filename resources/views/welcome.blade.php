<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
  <head>
    <title>Clean Flow - Gerenciamento Inteligente de Resíduos</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Clean Flow - Solução completa para gerenciamento, triagem e separação de resíduos sólidos" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-50 text-gray-900 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full z-30">
      <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-2">
          <div class="text-3xl">🌱</div>
          <span class="font-bold text-xl text-green-600 select-none">Clean Flow</span>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-8 items-center">
          <a href="#features" class="hover:text-green-600 font-medium transition">Recursos</a>
          <a href="#benefits" class="hover:text-green-600 font-medium transition">Benefícios</a>
          <a href="#contact" class="hover:text-green-600 font-medium transition">Contato</a>
          <form action="{{ route('login') }}" method="GET" class="ml-4">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-700 transition">
              Entrar
            </button>
          </form>
        </div>

        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-btn" class="md:hidden flex flex-col justify-between w-6 h-5 focus:outline-none" aria-label="Abrir menu">
          <span class="block h-0.5 w-full bg-gray-700"></span>
          <span class="block h-0.5 w-full bg-gray-700"></span>
          <span class="block h-0.5 w-full bg-gray-700"></span>
        </button>
      </nav>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <a href="#features" class="block px-6 py-3 hover:bg-green-50 border-b border-gray-100 font-medium">Recursos</a>
        <a href="#benefits" class="block px-6 py-3 hover:bg-green-50 border-b border-gray-100 font-medium">Benefícios</a>
        <a href="#contact" class="block px-6 py-3 hover:bg-green-50 border-b border-gray-100 font-medium">Contato</a>
        <form action="{{ route('login') }}" method="GET" class="px-6 py-3">
          @csrf
          <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">
            Entrar
          </button>
        </form>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-24 bg-white">
      <div class="max-w-7xl mx-auto px-6 md:flex md:items-center md:justify-between gap-12 py-16">
        <div class="md:w-1/2">
          <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight text-gray-900">
            Gerenciamento Inteligente de <br />
            <span class="text-green-600">Resíduos Sólidos</span>
          </h1>
          <p class="mt-6 text-gray-700 text-lg max-w-xl">
            Revolucione a gestão de resíduos com o Clean Flow. Nossa plataforma oferece
            triagem automatizada, separação por tipo e monitoramento em tempo real para
            uma gestão sustentável e eficiente.
          </p>
          <div class="mt-8 flex flex-wrap gap-4">
            <button class="bg-green-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition">
              Experimentar Grátis
            </button>
            <button class="border border-green-600 text-green-600 px-6 py-3 rounded-md font-semibold hover:bg-green-50 transition">
              Ver Demonstração
            </button>
          </div>
          <div class="mt-12 flex gap-8">
            <div class="text-center">
              <div class="text-3xl font-bold text-green-600">95%</div>
              <div class="text-gray-600 mt-1">Precisão na Triagem</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-green-600">40%</div>
              <div class="text-gray-600 mt-1">Redução de Custos</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-green-600">24/7</div>
              <div class="text-gray-600 mt-1">Monitoramento</div>
            </div>
          </div>
        </div>

        <div class="md:w-1/2 mt-12 md:mt-0">
          <div class="bg-gray-100 rounded-xl shadow-lg p-6 max-w-md mx-auto">
            <div class="flex justify-between items-center mb-4">
              <div class="font-semibold text-lg text-gray-800">Clean Flow Dashboard</div>
              <div class="flex items-center space-x-2 text-green-600 font-medium">
                <span class="block w-3 h-3 rounded-full bg-green-500"></span>
                <span>Sistema Ativo</span>
              </div>
            </div>

            <div class="space-y-4">
              <div class="flex justify-between space-x-4">
                <div class="flex items-center gap-3 bg-white rounded-lg p-3 shadow-sm w-1/3">
                  <div class="text-3xl">🥬</div>
                  <div>
                    <div class="font-semibold text-gray-700">Orgânico</div>
                    <div class="text-green-600 font-bold">2.3 ton</div>
                  </div>
                </div>
                <div class="flex items-center gap-3 bg-white rounded-lg p-3 shadow-sm w-1/3">
                  <div class="text-3xl">♻️</div>
                  <div>
                    <div class="font-semibold text-gray-700">Reciclável</div>
                    <div class="text-green-600 font-bold">1.8 ton</div>
                  </div>
                </div>
                <div class="flex items-center gap-3 bg-white rounded-lg p-3 shadow-sm w-1/3">
                  <div class="text-3xl">⚠️</div>
                  <div>
                    <div class="font-semibold text-gray-700">Perigoso</div>
                    <div class="text-green-600 font-bold">0.2 ton</div>
                  </div>
                </div>
              </div>

              <div>
                <div class="text-gray-700 font-semibold mb-1">Eficiência de Separação</div>
                <div class="relative bg-green-100 rounded-full h-4 overflow-hidden">
                  <div class="bg-green-600 h-4 rounded-full" style="width: 94%;"></div>
                </div>
                <div class="text-right text-green-600 font-bold mt-1">94%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-gray-50 py-16">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-12">
          <h2 class="text-3xl font-bold text-gray-900">Recursos Avançados</h2>
          <p class="mt-3 text-gray-600">
            Tecnologia de ponta para otimizar cada etapa do gerenciamento de resíduos
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition cursor-default">
            <div class="text-4xl mb-4">🤖</div>
            <h3 class="text-xl font-semibold mb-2">Triagem Automatizada</h3>
            <p class="text-gray-600">
              IA avançada para identificação e classificação automática de diferentes tipos de resíduos
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition cursor-default">
            <div class="text-4xl mb-4">📊</div>
            <h3 class="text-xl font-semibold mb-2">Analytics em Tempo Real</h3>
            <p class="text-gray-600">
              Dashboards interativos com métricas detalhadas sobre volume, tipos e eficiência
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition cursor-default">
            <div class="text-4xl mb-4">🔄</div>
            <h3 class="text-xl font-semibold mb-2">Rastreamento Completo</h3>
            <p class="text-gray-600">
              Acompanhe o ciclo completo dos resíduos desde a coleta até o destino final
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition cursor-default">
            <div class="text-4xl mb-4">📱</div>
            <h3 class="text-xl font-semibold mb-2">App Mobile</h3>
            <p class="text-gray-600">
              Acesse informações e controle operações diretamente do seu smartphone
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition cursor-default">
            <div class="text-4xl mb-4">🌍</div>
            <h3 class="text-xl font-semibold mb-2">Relatórios Ambientais</h3>
            <p class="text-gray-600">
              Gere relatórios de impacto ambiental e conformidade regulatória automaticamente
            </p>
          </div>

          <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition cursor-default">
            <div class="text-4xl mb-4">⚡</div>
            <h3 class="text-xl font-semibold mb-2">Otimização de Rotas</h3>
            <p class="text-gray-600">
              Algoritmos inteligentes para otimizar rotas de coleta e reduzir custos operacionais
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="bg-white py-16">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-12">
          <h2 class="text-3xl font-bold text-gray-900">Benefícios para sua Empresa</h2>
          <p class="mt-3 text-gray-600">
            Transforme a gestão de resíduos em uma vantagem competitiva sustentável
          </p>
        </div>

        <ul class="max-w-4xl mx-auto space-y-6 list-disc list-inside text-gray-700 text-lg">
          <li>Aumento da eficiência operacional com automação e monitoramento em tempo real.</li>
          <li>Redução de custos com logística e descarte incorreto.</li>
          <li>Conformidade com legislações ambientais e regulamentações locais.</li>
          <li>Melhoria da imagem corporativa perante clientes e investidores.</li>
          <li>Contribuição efetiva para a sustentabilidade e responsabilidade social.</li>
        </ul>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-gray-50 py-16">
      <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Fale Conosco</h2>
        <form action="/contato" method="POST" class="space-y-6">
          @csrf
          <input
            type="text"
            name="name"
            placeholder="Seu nome"
            required
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-green-600"
          />
          <input
            type="email"
            name="email"
            placeholder="Seu e-mail"
            required
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-green-600"
          />
          <textarea
            name="message"
            rows="5"
            placeholder="Sua mensagem"
            required
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-green-600 resize-none"
          ></textarea>
          <button
            type="submit"
            class="bg-green-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-green-700 transition"
          >
            Enviar Mensagem
          </button>
        </form>
      </div>
    </section>

    <footer class="bg-white border-t border-gray-200 py-6 text-center text-gray-600 text-sm select-none">
      © 2024 Clean Flow. Todos os direitos reservados.
    </footer>

    <script>
      const menuBtn = document.getElementById('mobile-menu-btn');
      const mobileMenu = document.getElementById('mobile-menu');

      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    </script>
  </body>
</html>
