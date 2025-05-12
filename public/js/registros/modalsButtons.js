const popup = document.getElementById('popupContainer');
const form = document.getElementById('formArmazenamento');

function abrirPopup() {
  popup.style.display = 'flex';
}

function fecharPopup() {
  popup.style.display = 'none';
  form.reset();
}

// Entrada de Residuos
const popupResiduos = document.getElementById('popupResiduos');
const formEntrada = document.getElementById('formEntrada');

function abrirPopupResiduos() {
  popupResiduos.style.display = 'flex';
}

function fecharPopupResiduos() {
  popupResiduos.style.display = 'none';
  form.reset();
}

// Saida de Residuos

const popupResiduosSaida = document.getElementById('popupResiduosSaida');
const formSaida = document.getElementById('formSaida');

function abrirPopupResiduoSaida() {
  popupResiduosSaida.style.display = 'flex';
}

function fecharPopupResiduoSaida() {
  popupResiduosSaida.style.display = 'none';
  form.reset();
}