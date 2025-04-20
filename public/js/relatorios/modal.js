// Controle do Modal
const modal = document.getElementById('relatorioModal');
const btn = document.getElementById('openModalBtn');
const span = document.getElementsByClassName('close')[0];

btn.onclick = () => modal.style.display = 'block';
span.onclick = () => modal.style.display = 'none';
window.onclick = (event) => {
    if (event.target == modal) modal.style.display = 'none';
}

// Cálculo automático do Total
const inputsPeso = document.querySelectorAll('input[name="reciclaveis"], input[name="organicos"], input[name="rejeitos"]');
const totalInput = document.querySelector('input[name="total"]');

inputsPeso.forEach(input => {
    input.addEventListener('input', calcularTotal);
});

function calcularTotal() {
    let total = 0;
    inputsPeso.forEach(input => {
        total += parseFloat(input.value) || 0;
    });
    totalInput.value = total.toFixed(2);
}

// Controle do Formulário
document.querySelector('.btn-limpar').addEventListener('click', () => {
    document.getElementById('formRelatorio').reset();
    modal.style.display = 'none';
});

document.getElementById('formRelatorio').addEventListener('submit', (e) => {
    e.preventDefault();
    // Adicionar lógica de envio aqui
    alert('Formulário enviado!');
    modal.style.display = 'none';
});