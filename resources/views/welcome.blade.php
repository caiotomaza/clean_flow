<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo ao Clean Flow</title>
    <link rel="stylesheet" href="{{ asset('css/welcome/style.css') }}">
</head>
<body>
    <div id="app">
        <header>
            <nav>
            <h1>Clean Flow</h1>
            <ul>
                <li><a href="{{ route('login') }}">Entrar</a></li>
            </ul>
            </nav>
        </header>

        <main>
            <section id="inicio" class="hero">
                <h2>Bem-vindo ao Clean Flow</h2>
                <p>Uma solução moderna para gestão de residuos solidos.</p>
                <button class="cta-button">Começar agora</button>
            </section>

            <section id="recursos" class="features">
            <h2>Nossos Recursos</h2>
            <div class="feature-grid">
                <div class="feature-card">
                <h3>Flexibilidade</h3>
                <p>Interface intuitiva e amigável</p>
                </div>
                <div class="feature-card">
                <h3>Dashboards práticas</h3>
                <p>Performance otimizada</p>
                </div>
                <div class="feature-card">
                <h3>Registro de auditoria avançado</h3>
                <p>Proteção de dados avançada</p>
                </div>
            </div>
            </section>

            <section id="contato" class="contact">
            <h2>Entre em Contato</h2>
            <p>Estamos aqui para ajudar.</p>
            <button class="contact-button">Fale Conosco</button>
            </section>
        </main>

        <footer>
            <p>&copy; 2025 Clean Flow. Todos os direitos reservados.</p>
        </footer>
        </div>
</body>
</html>