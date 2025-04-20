// --- Controle de Exibição do Modal ---
const modal = document.getElementById('relatorioModal');
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.querySelector('#relatorioModal .close');
const body = document.body; // Referência ao body

// Função para calcular a largura da barra de rolagem
function getScrollbarWidth() {
    // Cria um div externo invisível, força a barra de rolagem
    const outer = document.createElement('div');
    outer.style.visibility = 'hidden';
    outer.style.overflow = 'scroll'; // Force scrollbar
    outer.style.msOverflowStyle = 'scrollbar'; // Para IE/Edge
    body.appendChild(outer);

    // Cria um div interno
    const inner = document.createElement('div');
    outer.appendChild(inner);

    // Calcula a diferença de largura
    const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);

    // Remove os divs temporários
    outer.parentNode.removeChild(outer);

    return scrollbarWidth;
}

// Variável para guardar o padding original do body ou header
let originalPaddingRight = '';
// Seletor do seu header (AJUSTE SE NECESSÁRIO)
const headerElement = document.querySelector('header'); // Ou '.seu-header-class', '#seu-header-id'

// Função para abrir o modal
openModalBtn.onclick = () => {
    // Verifica se o corpo da página é maior que a janela (se tem scroll)
    const scrollbarWidth = window.innerWidth > body.clientWidth ? getScrollbarWidth() : 0;

    // Guarda o padding-right original do elemento que será ajustado
    // Ajuste aqui se for aplicar no header em vez do body
    originalPaddingRight = body.style.paddingRight || '';
    // originalPaddingRight = headerElement ? (headerElement.style.paddingRight || '') : '';


    // Aplica overflow hidden e o padding de compensação
    body.style.overflow = 'hidden';
    body.style.paddingRight = `${scrollbarWidth}px`;

    // Se o seu HEADER for position: fixed ou sticky, aplique o padding nele também:
    if (headerElement) {
       const headerPosition = window.getComputedStyle(headerElement).position;
       if (headerPosition === 'fixed' || headerPosition === 'sticky') {
            headerElement.style.paddingRight = `${scrollbarWidth}px`;
       }
    }


    modal.style.display = 'flex'; // Exibe o modal
};

// Função para fechar o modal
const closeModal = () => {
    modal.style.display = 'none'; // Esconde o modal

    // Restaura o overflow e o padding original
    body.style.overflow = 'auto';
    body.style.paddingRight = originalPaddingRight;

     // Restaura o padding do header se ele foi modificado
    if (headerElement) {
       const headerPosition = window.getComputedStyle(headerElement).position;
       if (headerPosition === 'fixed' || headerPosition === 'sticky') {
           // Verifica se o originalPaddingRight foi pego do header, senão usa ''
           // (Esta lógica pode precisar de ajuste dependendo de como você guardou o original)
           headerElement.style.paddingRight = ''; // Assume que o original era 0 ou não definido
       }
    }
};

// Fechar clicando no botão (X)
closeModalBtn.onclick = closeModal;

// Fechar clicando fora do conteúdo do modal
window.onclick = (event) => {
  if (event.target == modal) {
    closeModal();
  }
};

// Fechar pressionando a tecla Esc
window.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal.style.display === 'flex') {
        closeModal();
    }
});


// --- Restante do seu código JS (Lógica do Formulário) ---
// (O código do formulário, cálculo total, etc., permanece o mesmo)
// ...
const formRelatorio = document.getElementById('formRelatorio');
// ... (resto do código) ...
calcularTotal(); // Chama no final