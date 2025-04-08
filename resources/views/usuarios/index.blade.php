<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Usuários Cadastrados</title>
  <link rel="stylesheet" href="css\usuarios\style.css" />
</head>
<body>
  <header>
    <nav class="menu">
      <button class="icon-button" aria-label="Início">
        <img src="/caminhao-de-lixo.png" alt="Ícone da aplicação" width="50" />
      </button>
      <a href="#" class="menu-item">Dashboard</a>
      <a href="#" class="menu-item">Histórico</a>
      <a href="#" class="menu-item active">Relatórios</a>
      <a href="#" class="menu-item">Usuários</a>
    </nav>
    <div class="search-container">
      <input type="search" placeholder="Buscando por algo?" aria-label="Busca" />
      <div class="icons">
        <button class="icon-button" id="settings-btn" aria-label="Configurações">⚙️</button>
        <button class="icon-button" id="notifications-btn" aria-label="Notificações">
          🔔 <span class="badge">2</span>
        </button>
      </div>
    </div>
  </header>

  <main class="content">
    <header>
      <h1>Usuários Cadastrados</h1>
      <button class="btn-add">Cadastrar Usuário</button>
    </header>

    <section aria-label="Tabela de usuários">
      <table class="user-table">
        <thead>
          <tr>
            <th>USUÁRIO</th>
            <th>CPF</th>
            <th>EMAIL</th>
            <th>STATUS</th>
            <th>AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <!-- Aqui entraria um loop dinâmico, mas mantive como estava -->
          <!-- Repetições mantidas propositalmente -->
          <tr>
            <td>Segun Adebayo</td>
            <td>123.456.789-10</td>
            <td>sage@email.com</td>
            <td><span class="status ativo">🟢 Ativo</span></td>
            <td>
              <details class="dropdown">
                <summary class="dropdown-toggle">•••</summary>
                <div class="dropdown-menu">
                  <button class="editar-btn">Editar</button>
                </div>
              </details>
            </td>
          </tr>
          <!-- outros <tr> iguais omitidos para brevidade -->
        </tbody>
      </table>
    </section>

    <nav class="pagination" aria-label="Paginação">
      <button>&lt;</button>
      <button>1</button>
      <button class="active">2</button>
      <button>3</button>
      <span>...</span>
      <button>9</button>
      <button>10</button>
      <button>&gt;</button>
    </nav>

    <dialog id="modal" class="modal hidden">
      <form id="formCadastro" method="dialog" class="modal-content">
        <h2>Cadastrar Usuário</h2>

        <label for="nome">Nome</label>
        <input id="nome" type="text" placeholder="João da Silva" required />

        <label for="cpf">CPF</label>
        <input id="cpf" type="text" placeholder="xxx.xxx.xxx-xx" required />

        <label for="email">E-mail</label>
        <input id="email" type="email" placeholder="joaodasilva@email.com" required />

        <label for="senha">Senha</label>
        <input id="senha" type="password" placeholder="Crie uma senha" required />

        <div class="modal-buttons">
          <button type="button" id="cancelarBtn">Cancelar</button>
          <button type="submit" class="confirmar">Confirmar</button>
        </div>
      </form>
    </dialog>
  </main>
  <script src="{{ asset('js\usuarios\script.js') }}"></script>
</body>
</html>
