<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <title>Clean Flow - Gerenciamento Inteligente de Resíduos</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Clean Flow - Solução completa para gerenciamento, triagem e separação de resíduos sólidos" />
    <link rel="stylesheet" href="{{ asset('public/css/welcome/style.css') }}">
    <script src="{{ asset('public/js/welcome/script.js') }}"></script>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <div class="nav-brand">
          <div class="logo">
            <div class="logo-icon">🌱</div>
            <span class="logo-text">Clean Flow</span>
          </div>
        </div>
        <div class="nav-links">
          <a href="#features">Recursos</a>
          <a href="#benefits">Benefícios</a>
          <a href="#contact">Contato</a>
          <form action="{{ route('login') }}" method="GET">
                @csrf
                <button class="cta-button">Entrar</button>
            </form>
        </div>
        <div class="mobile-menu-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <div class="hero-text">
          <h1 class="hero-title">
            Gerenciamento Inteligente de 
            <span class="highlight">Resíduos Sólidos</span>
          </h1>
          <p class="hero-description">
            Revolucione a gestão de resíduos com o Clean Flow. Nossa plataforma oferece 
            triagem automatizada, separação por tipo e monitoramento em tempo real para 
            uma gestão sustentável e eficiente.
          </p>
          <div class="hero-actions">
            <button class="primary-button">Experimentar Grátis</button>
            <button class="secondary-button">Ver Demonstração</button>
          </div>
          <div class="hero-stats">
            <div class="stat">
              <span class="stat-number">95%</span>
              <span class="stat-label">Precisão na Triagem</span>
            </div>
            <div class="stat">
              <span class="stat-number">40%</span>
              <span class="stat-label">Redução de Custos</span>
            </div>
            <div class="stat">
              <span class="stat-number">24/7</span>
              <span class="stat-label">Monitoramento</span>
            </div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="dashboard-preview">
            <div class="dashboard-header">
              <div class="dashboard-title">Clean Flow Dashboard</div>
              <div class="dashboard-status">
                <span class="status-dot active"></span>
                Sistema Ativo
              </div>
            </div>
            <div class="dashboard-content">
              <div class="waste-categories">
                <div class="category organic">
                  <div class="category-icon">🥬</div>
                  <div class="category-info">
                    <span class="category-name">Orgânico</span>
                    <span class="category-amount">2.3 ton</span>
                  </div>
                </div>
                <div class="category recyclable">
                  <div class="category-icon">♻️</div>
                  <div class="category-info">
                    <span class="category-name">Reciclável</span>
                    <span class="category-amount">1.8 ton</span>
                  </div>
                </div>
                <div class="category hazardous">
                  <div class="category-icon">⚠️</div>
                  <div class="category-info">
                    <span class="category-name">Perigoso</span>
                    <span class="category-amount">0.2 ton</span>
                  </div>
                </div>
              </div>
              <div class="efficiency-meter">
                <div class="meter-label">Eficiência de Separação</div>
                <div class="meter-bar">
                  <div class="meter-fill" style="width: 94%"></div>
                </div>
                <div class="meter-value">94%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Recursos Avançados</h2>
          <p class="section-description">
            Tecnologia de ponta para otimizar cada etapa do gerenciamento de resíduos
          </p>
        </div>
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">🤖</div>
            <h3 class="feature-title">Triagem Automatizada</h3>
            <p class="feature-description">
              IA avançada para identificação e classificação automática de diferentes tipos de resíduos
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">📊</div>
            <h3 class="feature-title">Analytics em Tempo Real</h3>
            <p class="feature-description">
              Dashboards interativos com métricas detalhadas sobre volume, tipos e eficiência
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🔄</div>
            <h3 class="feature-title">Rastreamento Completo</h3>
            <p class="feature-description">
              Acompanhe o ciclo completo dos resíduos desde a coleta até o destino final
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">📱</div>
            <h3 class="feature-title">App Mobile</h3>
            <p class="feature-description">
              Acesse informações e controle operações diretamente do seu smartphone
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🌍</div>
            <h3 class="feature-title">Relatórios Ambientais</h3>
            <p class="feature-description">
              Gere relatórios de impacto ambiental e conformidade regulatória automaticamente
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3 class="feature-title">Otimização de Rotas</h3>
            <p class="feature-description">
              Algoritmos inteligentes para otimizar rotas de coleta e reduzir custos operacionais
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="benefits">
      <div class="container">
        <div class="benefits-content">
          <div class="benefits-text">
            <h2 class="section-title">Por que escolher o Clean Flow?</h2>
            <div class="benefit-list">
              <div class="benefit-item">
                <div class="benefit-icon">✅</div>
                <div class="benefit-content">
                  <h4>Redução de Custos Operacionais</h4>
                  <p>Automatização reduz custos de mão de obra em até 40%</p>
                </div>
              </div>
              <div class="benefit-item">
                <div class="benefit-icon">✅</div>
                <div class="benefit-content">
                  <h4>Conformidade Regulatória</h4>
                  <p>Mantenha-se sempre em conformidade com as normas ambientais</p>
                </div>
              </div>
              <div class="benefit-item">
                <div class="benefit-icon">✅</div>
                <div class="benefit-content">
                  <h4>Sustentabilidade Comprovada</h4>
                  <p>Aumente a taxa de reciclagem e reduza o impacto ambiental</p>
                </div>
              </div>
              <div class="benefit-item">
                <div class="benefit-icon">✅</div>
                <div class="benefit-content">
                  <h4>Escalabilidade Total</h4>
                  <p>Solução que cresce junto com sua operação</p>
                </div>
              </div>
            </div>
          </div>
          <div class="benefits-visual">
            <div class="impact-chart">
              <h4>Impacto Ambiental</h4>
              <div class="chart-bars">
                <div class="chart-bar">
                  <div class="bar-fill" style="height: 85%"></div>
                  <span class="bar-label">Reciclagem</span>
                </div>
                <div class="chart-bar">
                  <div class="bar-fill" style="height: 60%"></div>
                  <span class="bar-label">Compostagem</span>
                </div>
                <div class="chart-bar">
                  <div class="bar-fill" style="height: 25%"></div>
                  <span class="bar-label">Aterro</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
      <div class="container">
        <div class="cta-content">
          <h2 class="cta-title">Pronto para transformar sua gestão de resíduos?</h2>
          <p class="cta-description">
            Junte-se a centenas de empresas que já otimizaram suas operações com o Clean Flow
          </p>
          <div class="cta-actions">
            <button class="primary-button large">Começar Teste Gratuito</button>
            <button class="secondary-button large">Agendar Demonstração</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-brand">
            <div class="logo">
              <div class="logo-icon">🌱</div>
              <span class="logo-text">Clean Flow</span>
            </div>
            <p class="footer-description">
              Transformando a gestão de resíduos através da tecnologia e inovação.
            </p>
          </div>
          <div class="footer-links">
            <div class="footer-column">
              <h4>Produto</h4>
              <a href="#features">Recursos</a>
              <a href="#benefits">Benefícios</a>
              <a href="#">Preços</a>
            </div>
            <div class="footer-column">
              <h4>Empresa</h4>
              <a href="#">Sobre Nós</a>
              <a href="#">Carreiras</a>
              <a href="#">Blog</a>
            </div>
            <div class="footer-column">
              <h4>Suporte</h4>
              <a href="#">Central de Ajuda</a>
              <a href="#">Contato</a>
              <a href="#">Documentação</a>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2025 Clean Flow. Todos os direitos reservados.</p>
        </div>
      </div>
    </footer>
  </body>
</html>