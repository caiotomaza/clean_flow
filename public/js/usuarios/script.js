document.addEventListener("DOMContentLoaded", function () {

    function abrirModalCadastro() {
        const modal = new bootstrap.Modal(document.getElementById('modalUsuario'));
        document.getElementById('modalUsuarioLabel').innerText = "Cadastrar Novo Usuário";
        document.getElementById('formUsuario').reset();
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('btnSalvar').innerText = 'Cadastrar';
        document.getElementById('inputSenha').required = true;

        modal.show();
      }

      function abrirModalEdicao(id, nome, cpf, email) {
        const modal = new bootstrap.Modal(document.getElementById('modalUsuario'));
        document.getElementById('modalUsuarioLabel').innerText = "Editar Usuário";
        document.getElementById('formUsuario').action = `/usuarios/${id}`;
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('btnSalvar').innerText = 'Salvar Alterações';
        document.getElementById('inputSenha').required = false;

        document.getElementById('inputName').value = nome;
        document.getElementById('inputCpf').value = cpf;
        document.getElementById('inputEmail').value = email;

        modal.show();
      }
});
