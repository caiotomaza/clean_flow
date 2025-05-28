// Cadastro de veiculos
const PopupVeiculo = document.getElementById('PopupVeiculo');
const FormVeiculo = document.getElementById('FormVeiculo');

function AbrirPopupVeiculo() {
  PopupVeiculo.style.display = 'flex';
}

function FecharPopupVeiculo() {
  PopupVeiculo.style.display = 'none';
  FormVeiculo.reset();
}

// Cadastro de filiais
const PopupFilial = document.getElementById('PopupFilial');
const FormFilial = document.getElementById('FormFilial');

function AbrirPopupFilial() {
  PopupFilial.style.display = 'flex';
}

function FecharPopupFilial() {
  PopupFilial.style.display = 'none';
  FormFilial.reset();
}

// Cadastro de empresas
const PopupEmpresa = document.getElementById('PopupEmpresa');
const Formempresa = document.getElementById('FormEmpresa');

function AbrirPopupEmpresa() {
  PopupEmpresa.style.display = 'flex';
}

function FecharPopupEmpresa() {
  PopupEmpresa.style.display = 'none';
  Formempresa.reset();
}
