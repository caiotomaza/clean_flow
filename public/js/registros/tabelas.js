function mostrarTabela(tipo) {
    const secoes = ['tabela-entrada', 'tabela-armazenamento', 'tabela-saida'];
    secoes.forEach(id => {
        const secao = document.getElementById(id);
        if (secao) {
            secao.style.display = 'none';
        } else {
            console.warn(`Elemento com ID '${id}' não encontrado ao tentar escondê-lo.`);
        }
    });

    const idSelecionado = 'tabela-' + tipo;
    const secaoSelecionada = document.getElementById(idSelecionado);
    if (secaoSelecionada) { 
        secaoSelecionada.style.display = 'block';
    } else {
        console.warn(`Elemento com ID '${idSelecionado}' não encontrado ao tentar exibi-lo.`);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    mostrarTabela('entrada');
});