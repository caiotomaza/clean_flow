document.querySelector(".btn-add").addEventListener("click", () => {
  document.getElementById("modal").classList.remove("hidden");
  document.querySelectorAll("#modal input").forEach(input => input.value = "");
});

document.getElementById("cancelarBtn").addEventListener("click", () => {
  document.getElementById("modal").classList.add("hidden");
});

document.getElementById("formCadastro").addEventListener("submit", (e) => {
  e.preventDefault();
  alert("Usuário cadastrado com sucesso!");
  document.getElementById("modal").classList.add("hidden");
});

document.querySelectorAll('.dropdown-toggle').forEach((btn) => {
  btn.addEventListener('click', function (e) {
    const menu = this.nextElementSibling;
    menu.classList.toggle('hidden');
    document.querySelectorAll('.dropdown-menu').forEach((el) => {
      if (el !== menu) el.classList.add('hidden');
    });
    e.stopPropagation();
  });
});

document.addEventListener('click', () => {
  document.querySelectorAll('.dropdown-menu').forEach(menu => {
    menu.classList.add('hidden');
  });
});

document.querySelectorAll('.editar-btn').forEach((btn) => {
  btn.addEventListener('click', function () {
    const row = this.closest('tr');
    const nome = row.children[0].textContent;
    const cpf = row.children[1].textContent;
    const email = row.children[2].textContent;

    const modal = document.getElementById('modal');
    const inputs = modal.querySelectorAll('input');
    inputs[0].value = nome;
    inputs[1].value = cpf;
    inputs[2].value = email;
    inputs[3].value = '';

    modal.classList.remove('hidden');
  });
});

