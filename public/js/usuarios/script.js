function abrirModal(id) {
    const modal = document.getElementById(id);
    if (modal) modal.classList.remove('hidden');
}

function fecharModal(id) {
    const modal = document.getElementById(id);
    if (modal) modal.classList.add('hidden');
}