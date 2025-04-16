<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico - Produtos</title>
    <link rel="stylesheet" href="css\historico\style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <script src="status_randomizer.js">
    </script>
    <script src="script.js"></script>
    <header class="header">
      <div class="menu">
        <button class="icon-button">
            <img src="https://stratus.eco.br/wp-content/uploads/2024/07/caminhao-de-lixo.png" alt="Ícone" width="50">
          </button>
        <button class="menu-item">Dashboard</button>
        <button class="menu-item active">Histórico</button>
        <button class="menu-item">Relatórios</button>
        <button class="menu-item">Usuários</button>
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscando por algo?">
        <div class="icons">
            <button class="icon-button" id="settings-btn">⚙️</button>
            <button class="icon-button" id="notifications-btn">
                🔔 <span class="badge">2</span>
            </button>
        </div>
    </div>

    </header>
    <main>
        <h1 class="title">Histórico</h1>
        <div class="controle-topo">
          <div class="entrada-saida">
              <button class="entrada">Entrada de Carga</button>
              <button class="entrada-material">Entrada de Material</button>
              <button class="saida">Saída de Material</button>
          </div>
          <div class="pagination">
              <p>Páginas</p>
              <button onclick="changePage(-1)">&laquo;</button>
              <div id="page-numbers"></div>
              <button onclick="changePage(1)">&raquo;</button>
          </div>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nº de Registro</th>
                        <th>Usuário</th>
                        <th>Material</th>
                        <th>Detalhes</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tabela-corpo">
        </div>
    </main>
    <script src="{{ asset('js\historico\script.js') }}"></script>
    <script src="{{ asset('js\historico\status_randomizer.js') }}"></script>
    
</body>
</html>
