function cancelarEdicao(userId) {
    fecharModal('modalEditar' + userId);
    abrirModal('modalDetalhes' + userId);
}