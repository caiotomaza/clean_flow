@extends('layouts.app')

@section('title', 'Usuários Cadastrados')

@section('content')
<link rel="stylesheet" href="{{ asset('css/usuarios/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<main class="content">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="top-header">
        <h1>Usuários Cadastrados</h1>
        <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#modalCadastro">
            Cadastrar Novo Usuário
        </button>
    </section>

    <section aria-label="Tabela de usuários">
        <table class="user-table">
            <thead>
                <tr>
                    <th scope="col">USUÁRIO</th>
                    <th scope="col">CPF</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->cpf }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><span class="status ativo">🟢 Ativo</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $usuario->id }}">
                                Editar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Nenhum usuário encontrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>

    @if($usuarios->links())
        <nav>{{ $usuarios->links() }}</nav>
    @endif

    <!-- Modal de Cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="formUsuario">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCadastroLabel">Cadastrar Novo Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="name" id="inputName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>CPF</label>
                            <input type="text" name="cpf" id="inputCpf" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label id="labelSenha">Senha</label>
                            <input type="password" name="password" id="inputSenha" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" id="btnSalvar">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modais de Edição -->
    @foreach($usuarios as $user)
        <div class="modal fade" id="modalEditar{{ $user->id }}" tabindex="-1" aria-labelledby="modalEditarLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel{{ $user->id }}">Editar Usuário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control" value="{{ $user->cpf }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Nova Senha (deixe em branco se não quiser alterar)</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</main>
@endsection
