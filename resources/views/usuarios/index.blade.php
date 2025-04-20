@extends('layouts.app')

@section('title', 'Usuários Cadastrados')


@section('head')
    <link rel="stylesheet" href="{{ asset('css/usuarios/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuarios/modal.css') }}">
@endsection
@section('content')
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
        <button class="btn-add" onclick="abrirModal('modalCadastro')">
            Cadastrar Novo Usuário
        </button>
    </section>

    <section aria-label="Tabela de usuários">
        <table class="user-table">
            <thead>
                <tr>
                    <th>USUÁRIO</th>
                    <th>CPF</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>AÇÕES</th>
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
                            <button class="btn-edit" onclick="abrirModal('modalEditar{{ $usuario->id }}')">Editar</button>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-edit" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">deletar</button>
                            </form>
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
    <div id="modalCadastro" class="modal hidden">
        <div class="modal-box">
            <form method="POST" id="formUsuario">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-header">
                    <h5>Cadastrar Novo Usuário</h5>
                    <span class="modal-close" onclick="fecharModal('modalCadastro')">&times;</span>
                </div>
                <div class="modal-body">
                    <label>Nome</label>
                    <input type="text" name="name" id="inputName" required>
                    <label>CPF</label>
                    <input type="text" name="cpf" id="inputCpf" required>
                    <label>Email</label>
                    <input type="email" name="email" id="inputEmail" required>
                    <label id="labelSenha">Senha</label>
                    <input type="password" name="password" id="inputSenha">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="fecharModal('modalCadastro')">Cancelar</button>
                    <button type="submit" class="btn-confirmar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modais de Edição -->
    @foreach($usuarios as $user)
        <div id="modalEditar{{ $user->id }}" class="modal hidden">
            <div class="modal-box">
                <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5>Editar Usuário</h5>
                        <span class="modal-close" onclick="fecharModal('modalEditar{{ $user->id }}')">&times;</span>
                    </div>
                    <div class="modal-body">
                        <label>Nome</label>
                        <input type="text" name="name" value="{{ $user->name }}" required>
                        <label>CPF</label>
                        <input type="text" name="cpf" value="{{ $user->cpf }}" required>
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" required>
                        <label>Nova Senha (deixe em branco se não quiser alterar)</label>
                        <input type="password" name="password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="fecharModal('modalEditar{{ $user->id }}')">Cancelar</button>
                        <button type="submit" class="btn-confirmar">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Scripts -->
    <script src="{{asset('js/usuarios/script.js')}}"></script>
</main>
@endsection
