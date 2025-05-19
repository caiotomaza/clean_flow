function abrirModal(id) {
  const modal = document.getElementById(id);
  if (modal) modal.classList.remove('hidden');
}

function fecharModal(id) {
  const modal = document.getElementById(id);
  if (modal) modal.classList.add('hidden');
}

function cancelarEdicao(userId) {
  fecharModal('modalEditar' + userId);
  abrirModal('modalDetalhes' + userId);
}

  function abrirAba(abaId) {
    const abas = document.querySelectorAll('.aba-editar');
    abas.forEach(aba => aba.classList.add('hidden'));
    document.getElementById('aba-' + abaId).classList.remove('hidden');
  }

  