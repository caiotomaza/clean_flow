// Variáveis globais
const modal = document.getElementById("modalEmpresa");
const btnNovaEmpresa = document.getElementById("btnNovaEmpresa");
const fecharModalBtn = document.getElementById("fecharModal");
const btnCancelar = document.getElementById("btnCancelar");
const formEmpresa = document.getElementById("formEmpresa");
let empresaSelecionada = null;

// Event Listeners
btnNovaEmpresa.addEventListener("click", abrirModal);
fecharModalBtn.addEventListener("click", fecharModal);
btnCancelar.addEventListener("click", fecharModal);
formEmpresa.addEventListener("submit", salvarEmpresa);

// Máscaras para campos (será necessário incluir uma biblioteca como InputMask ou implementar)
// Aqui vou colocar apenas placeholders para as máscaras
document.getElementById("cnpj").addEventListener("input", function(e) {
  // Implementar máscara de CNPJ: 00.000.000/0000-00
});

document.getElementById("telefone").addEventListener("input", function(e) {
  // Implementar máscara de telefone: (00) 0000-0000
});

document.getElementById("cep").addEventListener("input", function(e) {
  // Implementar máscara de CEP: 00000-000
});

// Funções
function abrirModal() {
  formEmpresa.reset();
  empresaSelecionada = null;
  modal.style.display = "block";
}

function fecharModal() {
  modal.style.display = "none";
}

function salvarEmpresa(e) {
  e.preventDefault();
  
  // Obter valores do formulário
  const razaoSocial = document.getElementById("razaoSocial").value;
  const nomeFantasia = document.getElementById("nomeFantasia").value;
  const cnpj = document.getElementById("cnpj").value;
  const inscricaoEstadual = document.getElementById("inscricaoEstadual").value;
  const telefone = document.getElementById("telefone").value;
  const email = document.getElementById("email").value;
  const endereco = document.getElementById("endereco").value;
  const bairro = document.getElementById("bairro").value;
  const cidade = document.getElementById("cidade").value;
  const estado = document.getElementById("estado").value;
  const cep = document.getElementById("cep").value;

  // Validação básica
  if (!razaoSocial || !cnpj || !telefone || !email) {
    alert("Por favor, preencha os campos obrigatórios!");
    return;
  }

  // Obter a tabela
  const tabela = document.getElementById("tabelaEmpresas");

  if (empresaSelecionada) {
    // Edição de empresa existente
    empresaSelecionada.cells[0].innerText = empresaSelecionada.rowIndex;
    empresaSelecionada.cells[1].innerText = razaoSocial;
    empresaSelecionada.cells[2].innerText = cnpj;
    empresaSelecionada.cells[3].innerText = telefone;
    empresaSelecionada.cells[4].innerText = email;
  } else {
    // Nova empresa
    const linha = tabela.insertRow();
    linha.insertCell(0).innerText = tabela.rows.length;
    linha.insertCell(1).innerText = razaoSocial;
    linha.insertCell(2).innerText = cnpj;
    linha.insertCell(3).innerText = telefone;
    linha.insertCell(4).innerText = email;

    const acoes = linha.insertCell(5);
    acoes.innerHTML = `
      <button onclick="editarEmpresa(this)">Editar</button>
      <button onclick="excluirEmpresa(this)">Excluir</button>
    `;
  }

  fecharModal();
}

// Funções globais para os botões de ação
window.editarEmpresa = function(botao) {
  empresaSelecionada = botao.parentElement.parentElement;
  
  // Preencher o formulário com os dados da empresa
  document.getElementById("razaoSocial").value = empresaSelecionada.cells[1].innerText;
  document.getElementById("cnpj").value = empresaSelecionada.cells[2].innerText;
  document.getElementById("telefone").value = empresaSelecionada.cells[3].innerText;
  document.getElementById("email").value = empresaSelecionada.cells[4].innerText;
  
  // Nota: Neste exemplo básico, estamos apenas preenchendo os campos obrigatórios
  // Num sistema real, você precisaria armazenar todos os dados (talvez usando data-attributes)
  
  abrirModal();
};

window.excluirEmpresa = function(botao) {
  if (confirm("Tem certeza que deseja excluir esta empresa?")) {
    const linha = botao.parentElement.parentElement;
    linha.remove();
    
    // Atualizar os IDs das linhas restantes
    const tabela = document.getElementById("tabelaEmpresas");
    for (let i = 0; i < tabela.rows.length; i++) {
      tabela.rows[i].cells[0].innerText = i + 1;
    }
  }
};

// Fechar modal ao clicar fora
window.onclick = function(event) {
  if (event.target == modal) {
    fecharModal();
  }
};