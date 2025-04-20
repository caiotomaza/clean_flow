document.addEventListener('DOMContentLoaded', function() {
    // Pegar os elementos do DOM
    const modal = document.getElementById('modalEntradaCarga');
    const btnAbrirModal = document.getElementById('btnAbrirModalEntradaCarga');
    const btnFecharModal = document.getElementById('btnCloseModalEntradaCarga');

    // Função para abrir o modal
    function abrirModal() {
        if(modal) {
            modal.classList.add('is-visible');
        }
    }

    // Função para fechar o modal
    function fecharModal() {
        if(modal) {
            modal.classList.remove('is-visible');
        }
    }

    // Adicionar evento ao botão de abrir
    if (btnAbrirModal) {
        btnAbrirModal.addEventListener('click', abrirModal);
    }

    // Adicionar evento ao botão de fechar (o 'X')
    if (btnFecharModal) {
        btnFecharModal.addEventListener('click', fecharModal);
    }

    // Adicionar evento para fechar o modal clicando fora dele (no overlay)
    if (modal) {
        modal.addEventListener('click', function(event) {
            // Verifica se o clique foi diretamente no fundo do modal (overlay)
            if (event.target === modal) {
                fecharModal();
            }
        });
    }

    // (Opcional) Fechar o modal com a tecla ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape" && modal && modal.classList.contains('is-visible')) {
            fecharModal();
        }
    });
});